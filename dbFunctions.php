<?php
function getAll(string $table, PDO $pdo, int $limit = 100): array
{
    $select = "SELECT * FROM `$table` LIMIT $limit";
    $result = $pdo->query($select);

    if (!$result) {
        return pdoError($pdo, []);
    }

    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function deleteById(string $table, string $key, int $keyValue, PDO $pdo): int
{
    $delete = "DELETE FROM `$table` WHERE $key = $keyValue LIMIT 1";
    $result = $pdo->query($delete);

    if (!$result) {
        return pdoError($pdo, 0);
    }

    return (int) $result->rowCount();
}

function getById(string $table, string $key, int $keyValue, PDO $pdo): array
{
    $delete = "SELECT * FROM `$table` WHERE $key = $keyValue LIMIT 1";
    $result = $pdo->query($delete);

    if (!$result) {
        return pdoError($pdo, []);
    }

    $res = $result->fetch(PDO::FETCH_ASSOC);
    return $res ?: [];
}

function add(string $table, array $data, PDO $pdo)
{
    $fields = array_keys($data);
    $fieldsStr = implode(',', $fields);

    $values = [];
    foreach ($fields as $field) {
        $values[] = ':' . $field;
    }
    $valuesStr = implode(',', $values);
    $insert = "INSERT INTO `$table` ($fieldsStr) VALUES($valuesStr)";

    $stmt = $pdo->prepare($insert);

    $postData = [];
    foreach ($data as $k => $value) {
        $postData[":$k"] = $value;
    }
    $result = $stmt->execute($postData);

    // $stmt->debugDumpParams();

    // var_dump($result, $pdo->lastInsertId(), $pdo->errorInfo());

    return $pdo->lastInsertId();
}

function pdoError(PDO $pdo, $return)
{
    trigger_error(json_encode($pdo->errorInfo()));
    return $return;
}