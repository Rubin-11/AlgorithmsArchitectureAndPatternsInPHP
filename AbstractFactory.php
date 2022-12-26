<?php

class PostgreSql {
    // Подключение к PostgreSql
}

class Oracle {
    // Подключение к Oracle
}

class MySql {
    // Подключение к MySql
}

class Application {

    protected $dbConnection;
    protected $dbRecord;
    protected $dbQueryBuilder;

    public function __construct(ServiceFactoryInterface $serviceFactory)
    {
        $this->dbConnection = $serviceFactory->createDbConnection();  // Подключение
        $this->dbRecord = $serviceFactory->createDbRecord();  // Запись
        $this->dbQueryBuilder = $serviceFactory->createDbQueryBuilder(); // Запрос

    }

    public function closeConnection()
    {
        $this->dbConnection->closeConnection();
    }

    public function connectionInfo()
    {
        $this->dbConnection->connectionStatus();
    }

    public function getAll()
    {
        $this->dbQueryBuilder->getAll();
    }

    public function insert()
    {
        $this->dbRecord->insertOne();
    }
}

interface DbConnectionInterface {
    public function connectionStatus();
    public function closeConnection();
};

interface DbRecordInterface {
    public function getOne();
    public function insertOne();
    public function updateOne();
    public function deleteONe();
};

interface DbQueryBuilderInterface {
    public function getAll();
    public function getAllWhere();
    public function getAllWhereIn();
};

abstract class BaseMySqlORM
{
    private MySql $mysqlConnection;

    public function __construct(MySql $mysqlConnection)
    {
        $this->mysqlConnection = $mysqlConnection;
    }

    public function getMysqlConnection(): MySql
    {
        return $this->mysqlConnection;
    }
}

abstract class BaseOracleORM
{
    private Oracle $oracleConnection;

    public function __construct(Oracle $oracleConnection)
    {
        $this->oracleConnection = $oracleConnection;
    }

    public function getOracleConnection(): Oracle
    {
        return $this->oracleConnection;
    }
}

abstract class BasePostgreORM
{
    private PostgreSql $postgreConnection;

    public function __construct(PostgreSql $postgreConnection)
    {
        $this->postgreConnection = $postgreConnection;
    }

    public function getPostgreConnection(): PostgreSql
    {
        return $this->postgreConnection;
    }
}


class MysqlDbConnection extends BaseMySqlORM implements DbConnectionInterface
{

    public function connectionStatus()
    {
        echo 'Этот сервис работает с MySQL' . PHP_EOL;
    }

    public function closeConnection()
    {
        // TODO: Implement closeConnection() method.
    }
}

class MySqlDbRecord extends BaseMySqlORM implements DbRecordInterface
{

    public function getOne()
    {
        // TODO: Implement getOne() method.
    }

    public function insertOne()
    {
        echo 'Добавляю запись в таблицу MySQL базы данных' . PHP_EOL;
    }

    public function updateOne()
    {
        // TODO: Implement updateOne() method.
    }

    public function deleteONe()
    {
        // TODO: Implement deleteONe() method.
    }
}

class MySqlDbQueryBuilder extends BaseMySqlORM implements DbQueryBuilderInterface
{

    public function getAll()
    {
        echo 'Получаю все файлы из таблицы в MySQL базе данных' . PHP_EOL;
    }

    public function getAllWhere()
    {
        // TODO: Implement getAllWhere() method.
    }

    public function getAllWhereIn()
    {
        // TODO: Implement getAllWhereIn() method.
    }
}


class OracleDbConnection extends BaseOracleORM implements DbConnectionInterface
{

    public function connectionStatus()
    {
        echo 'Этот сервис работает с Oracle' . PHP_EOL;
    }

    public function closeConnection()
    {
        // TODO: Implement closeConnection() method.
    }
}

class OracleDbRecord extends BaseOracleORM implements DbRecordInterface
{

    public function getOne()
    {
        // TODO: Implement getOne() method.
    }

    public function insertOne()
    {
        echo 'Добавляю запись в таблицу Oracle базы данных' . PHP_EOL;
    }

    public function updateOne()
    {
        // TODO: Implement updateOne() method.
    }

    public function deleteONe()
    {
        // TODO: Implement deleteONe() method.
    }
}

class OracleDbQueryBuilder extends BaseOracleORM implements DbQueryBuilderInterface
{

    public function getAll()
    {
        echo 'Получаю все файлы из таблицы в Oracle базе данных' . PHP_EOL;
    }

    public function getAllWhere()
    {
        // TODO: Implement getAllWhere() method.
    }

    public function getAllWhereIn()
    {
        // TODO: Implement getAllWhereIn() method.
    }
}


class PostgreDbConnection extends BasePostgreORM implements DbConnectionInterface
{

    public function connectionStatus()
    {
        echo 'Этот сервис работает с PostgreSQL' . PHP_EOL;
    }

    public function closeConnection()
    {
        // TODO: Implement closeConnection() method.
    }
}

class PostgreDbRecord extends BasePostgreORM implements DbRecordInterface
{

    public function getOne()
    {
        // TODO: Implement getOne() method.
    }

    public function insertOne()
    {
        echo 'Добавляю запись в таблицу PostgreSQL базы данных' . PHP_EOL;
    }

    public function updateOne()
    {
        // TODO: Implement updateOne() method.
    }

    public function deleteONe()
    {
        // TODO: Implement deleteONe() method.
    }
}

class PostgreDbQueryBuilder extends BasePostgreORM implements DbQueryBuilderInterface
{

    public function getAll()
    {
        echo 'Получаю все файлы из таблицы в PostgreSQL базе данных' . PHP_EOL;
    }

    public function getAllWhere()
    {
        // TODO: Implement getAllWhere() method.
    }

    public function getAllWhereIn()
    {
        // TODO: Implement getAllWhereIn() method.
    }
}

interface ServiceFactoryInterface {  // Абстрактная фабрика
    public function createDbConnection(): DbConnectionInterface;
    public function createDbRecord(): DbRecordInterface;
    public function createDbQueryBuilder(): DbQueryBuilderInterface;
}

class MySqlORMFactory implements ServiceFactoryInterface {

    private MySql $mySqlConnection;

    public function __construct(MySql $mySqlConnection)
    {
        $this->mySqlConnection = $mySqlConnection;
    }

    public function createDbConnection(): DbConnectionInterface
    {
        return new MysqlDbConnection($this->mySqlConnection);
    }

    public function createDbRecord(): DbRecordInterface
    {
        return new MySqlDbRecord($this->mySqlConnection);
    }

    public function createDbQueryBuilder(): DbQueryBuilderInterface
    {
        return new MySqlDbQueryBuilder($this->mySqlConnection);
    }
}

class OracleORMFactory  implements ServiceFactoryInterface {

    private Oracle $oracleConnection;

    public function __construct(Oracle $oracleConnection)
    {
        $this->oracleConnection = $oracleConnection;
    }

    public function createDbConnection(): DbConnectionInterface
    {
        return new OracleDbConnection($this->oracleConnection);
    }

    public function createDbRecord(): DbRecordInterface
    {
        return new OracleDbRecord($this->oracleConnection);
    }

    public function createDbQueryBuilder(): DbQueryBuilderInterface
    {
        return new OracleDbQueryBuilder($this->oracleConnection);
    }
}

class PostgreORMFactory implements ServiceFactoryInterface
{
    private PostgreSql $postgreConnection;

    public function __construct(PostgreSql $postgreConnection)
    {
        $this->postgreConnection = $postgreConnection;
    }

    public function createDbConnection(): DbConnectionInterface
    {
        return new PostgreDbConnection($this->postgreConnection);
    }

    public function createDbRecord(): DbRecordInterface
    {
        return new PostgreDbRecord($this->postgreConnection);
    }

    public function createDbQueryBuilder(): DbQueryBuilderInterface
    {
        return new PostgreDbQueryBuilder($this->postgreConnection);
    }
}

$postgreFactory = new PostgreORMFactory(new PostgreSql());
$postgreORM = new Application($postgreFactory);
$postgreORM->connectionInfo();
$postgreORM->getAll();
$postgreORM->insert();

$oracleFactory = new OracleORMFactory(new Oracle());
$oracleORM = new Application($oracleFactory);
$oracleORM->connectionInfo();
$oracleORM->getAll();
$oracleORM->insert();

$mysqlFactory = new MySqlORMFactory(new MySql());
$mysqlORM = new Application($mysqlFactory);
$mysqlORM->connectionInfo();
$mysqlORM->getAll();
$mysqlORM->insert();