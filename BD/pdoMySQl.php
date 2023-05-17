<?php
require_once 'ResErrorClassMessage.php';

class pdoMySQl
{
    protected PDO $PDOAccess;
    protected array $ql = [];

    public function __construct(object $pgsqlConnect)
    {
        require_once "queryDB.php";
        $this->connectPDO($pgsqlConnect);
    }

    public function connectPDO(object $pgsqlConnect)
    {
        try {
            //$this->PDOAccess = new PDO('mysql:host=77.236.64.218:3306;dbname=meteo', "root", "3422671786");
            $this->PDOAccess = new PDO("mysql:host=$pgsqlConnect->host:$pgsqlConnect->port;dbname=$pgsqlConnect->dbname", $pgsqlConnect->username, $pgsqlConnect->password);
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
            $res = $this->PDOAccess->query($this->ql[$sql],PDO::FETCH_ASSOC)->fetchAll(PDO::FETCH_ASSOC);
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

    public function produreDB($nameProc)
    {
        try {
            $resF = new ResErrorClassMessage();
            $res = $this->PDOAccess->query($this->ql[$nameProc],PDO::FETCH_ASSOC)->fetchAll(PDO::FETCH_ASSOC);
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