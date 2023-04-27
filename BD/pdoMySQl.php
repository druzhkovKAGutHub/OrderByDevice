<?php
require_once 'ResErrorClassMessage.php';

class pdoMySQl
{
    protected mysqli $PDOAccess;
    protected array $ql = [];

    public function __construct(object $pgsqlConnect)
    {
        require_once "queryDB.php";
        $this->connectPDO($pgsqlConnect);
    }

    public function __destruct(){
        $this->PDOAccess->close();
    }
    public function connectPDO(object $pgsqlConnect)
    {
        try {
            $conn = new mysqli("10.222.222.220:3306", "root", "3422671786", 'meteo');
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            //$sql_query = $this->ql['device_info'];
            //$sth = $conn->query($this->ql['device_info']);
            $this->PDOAccess = $conn;

            //$this->PDOAccess = new PDO("pgsql:host=$pgsqlConnect->host;port=$pgsqlConnect->port;dbname=$pgsqlConnect->dbname;user=$pgsqlConnect->username;password=$pgsqlConnect->password");
        } catch (PDOException $e) {
            exit('{"res":"dbError","descr":"' . addslashes($e->getMessage()) . '"}');
        }
    }

    /**
     * проверить результат возвращенный методом pdo и прочитать ошибку
     */
    private function ResPDOInfo($sth, &$resF) {
        if (!empty($resF))
            if (is_object($resF))
                if (is_bool($sth)) {
                    if (!$sth) {
                        $info = $this->PDOAccess->errorInfo();
                        $resF->StatusErr = true;
                        $resF->addResFunction_Array($info);
                        return ;
                    }
                }
    }
    /**
     * @param $sql
     * @return array
     */
    public function selectDB($sql)
    {
        try {
            $resF = new ResErrorClassMessage();
            //echo "selectDB:{$sql}";
           //$sth = $this->PDOAccess->query($this->ql[$sql]);
            $res = $this->PDOAccess->query($this->ql[$sql],MYSQLI_STORE_RESULT)->fetch_all(MYSQLI_ASSOC);
            return $res ?? [];

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit('{"res":"dbError","descr":"' . addslashes($e->getMessage()) . '"}');
        }
        catch (Exception $e) {
            $resF = $resF ?? new ResErrorClassMessage();
            $resF->StatusErr = true;
            $resF->addResFunction_Array($e->getMessage());
            //return $resF;
        } catch (Error $e) {
            $resF = $resF ?? new ResErrorClassMessage();
            $resF->StatusErr = true;
            $resF->addResFunction_Array($e->getMessage());
        } catch (Throwable $e) {
            $resF = $resF ?? new ResErrorClassMessage();
            $resF->StatusErr = true;
            $resF->addResFunction_Array($e->getMessage());
            // return $resF;
        }
        return $resF ?? [];
    }

}