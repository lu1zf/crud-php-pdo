<?php 
    //  Conexão com o BD
    try {
        $pdo = new PDO("mysql:dbname=CRUDPDO;host=localhost", "luiz", "123456789");
    } catch (PDOException $e) {
        echo "Erro com banco de dados:" .$e->getMessage();
    } catch (Exception $e) {
        echo "Erro genérico:" .$e->getMessage();
    }

    // INSERT

    // 1a forma: utilizando prepare
    // $res = $pdo->prepare("INSERT INTO PESSOA(nome, telefone, email) VALUES (:n, :t, :e)"); 

    // $res->bindValue(":n", "Roberta");
    // $res->bindValue(":t", "111111111");
    // $res->bindValue(":e", "roberta@teste.com");

    // $res->execute();

    // 2a forma: utilizando query
    // $pdo->query("INSERT INTO pessoa(nome, telefone, email) VALUES ('Luiz', '123456789', 'luiz@teste.com')");

    // DELETE e UPDATE
        // DELETE
    // $cmd = $pdo->prepare("DELETE FROM PESSOA WHERE id = :id");
    // $id = 4;
    // $cmd->bindValue(":id", $id);
    // $cmd->execute();

        // UPDATE
    // $cmd = $pdo->prepare("UPDATE PESSOA SET email = :e WHERE id = :id");
    // $id = 1;
    // $email = "luiz@gmail.com";
    // $cmd->bindValue(":e", $email);
    // $cmd->bindValue(":id", $id);

    // $cmd->execute();

    // SELECT

    $cmd = $pdo->prepare("SELECT * FROM PESSOA WHERE id = :id");
    $cmd->bindValue(":id", 2);
    $cmd->execute();
    $resultado = $cmd->fetch(PDO::FETCH_ASSOC); //       Para quando só vem 1 registro do BD
    //$cmd->fetchAll(); //    Para quando vem vários registros do BD

    foreach ($resultado as $key => $value) {
        echo $key.":".$value."<br>";
    }
?>