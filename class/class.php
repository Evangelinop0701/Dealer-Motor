<?php

class database
{
    protected $servername = 'localhost';
    protected $hostname = 'root';
    protected $password = '';
    protected $dbname = 'db_deliermotor';
    protected $conn;

    public function __construct()
    {
        if (!isset($this->conn)) {
            $this->conn = new mysqli($this->servername, $this->hostname, $this->password, $this->dbname) ;
        }

        if(!$this->conn) {
            echo 'Koneksaun Database La Susessu';
        }

        return $this->conn;

    }
}

class user extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function chek_login($username, $password)
    {
        $pass = md5($password);
        $sql = "SELECT t.id_tbdor,t.foto, t.naran_tbdr,t.sexu,m.naran_mun,p.naran_postu, s.naran_suku, t.hela_fatin, u.id_user, u.username, u.passwords, u.level FROM t_trabalho t, t_user u, t_suku s, t_postu p,
         t_muni m WHERE t.id_tbdor=u.id_tbdr AND s.id_suku=t.id_suku AND p.id_postu = s.id_postu AND p.id_mun = m.id_mun AND u.username='$username' AND u.passwords='$pass'" ;
        $query = $this->conn->query($sql);
        $result =$query->fetch_assoc();
        $num_rows = mysqli_num_rows($query);

        if ($num_rows > 0) {
            $_SESSION['username'] = true;
            $_SESSION['passwords'] = true;
            $_SESSION['id_tbdor'] = $result['id_tbdor'];
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['passwords'] = $result['passwords'];
            $_SESSION['foto'] = $result['foto'];
            $_SESSION['level'] = $result['level'];


            return true;
        } else {
            return false;
        }
    }

    public function get_sessi()
    {
        return $_SESSION['username'] and $_SESSION['passwords'];
    }

    public function dtalho_user($field, $id)
    {

        $sql = "SELECT t.id_tbdor,t.foto, t.naran_tbdr, t.no_tlf, t.sexu,m.naran_mun,p.naran_postu, s.naran_suku, t.hela_fatin, u.id_user, u.username, u.passwords, u.level FROM t_trabalho t, t_user u, t_suku s, t_postu p,
         t_muni m WHERE t.id_tbdor=u.id_tbdr AND s.id_suku=t.id_suku AND p.id_postu = s.id_postu AND p.id_mun = m.id_mun AND t.id_tbdor='$id'";
        $query = $this->conn->query($sql);
        $result=$query->fetch_assoc();

        if ($field  == "id_tbdor") {
            return $result['id_tbdor'];
        } elseif ($field == "naran_tbdr") {
            return $result['naran_tbdr'];
        } elseif ($field == "sexu") {
            return $result['sexu'];
        } elseif ($field == "foto") {
            return $result['foto'];
        } elseif ($field == "level") {
            return $result['level'];
        } elseif ($field == "naran_suku") {
            return $result['naran_suku'];
        } elseif ($field == "naran_mun") {
            return $result['naran_mun'];
        } elseif ($field == "naran_postu") {
            return $result['naran_postu'];
        } elseif ($field == "hela_fatin") {
            return $result['hela_fatin'];
        } elseif ($field == "no_tlf") {
            return $result['no_tlf'];
        } elseif ($field == "id_user") {
            return $result['id_user'];
        }
    }

    public function showdados()
    {

        $sql = "SELECT t.id_tbdor,t.foto, t.naran_tbdr,t.sexu,m.naran_mun,p.naran_postu, s.naran_suku,
         t.hela_fatin, u.id_user, u.username, u.passwords, u.level FROM t_trabalho t, t_user u, t_suku s, t_postu p,
         t_muni m WHERE t.id_tbdor=u.id_tbdr AND s.id_suku=t.id_suku AND p.id_postu = s.id_postu AND p.id_mun = m.id_mun";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }

    public function showdados_form($id)
    {


        $sql = "SELECT t.id_tbdor,t.foto, t.naran_tbdr,t.sexu,m.naran_mun,p.naran_postu, s.naran_suku,
         t.hela_fatin, u.id_user, u.username, u.passwords, u.pass, u.level FROM t_trabalho t, t_user u, t_suku s, t_postu p,
         t_muni m WHERE t.id_tbdor=u.id_tbdr AND s.id_suku=t.id_suku AND p.id_postu = s.id_postu AND p.id_mun = m.id_mun AND  u.id_user='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }


    }

    public function updatepass($id, $user, $password, $pass)
    {

        $sql = "UPDATE t_user SET username = '$user', passwords='$password', pass='$pass' WHERE id_user = '$id'";
        $this->conn->query($sql);

    }

    public function updatesession($username, $last_log, $id_session)
    {

        $sql = "UPDATE t_user SET id_session = '$id_session', last_log='$last_log' WHERE username = '$username'";
        $this->conn->query($sql);

    }

}



class sasan extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function showdados()
    {

        $sql = "SELECT * FROM t_sasan";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }

    public function showForm($id)
    {
        $sql = "SELECT * FROM t_sasan WHERE id_sasan='$id'";
        $query = $this->conn->query($sql);
        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }

    public function detalho_sasan($id)
    {

        $sql = "SELECT * FROM t_sasan WHERE id_sasan='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }
}

// class crud


class CRUD extends database
{
    public function __construct()
    {
        parent::__construct();
    }


    //To read data
    public function read_data($table, $id, $id_value)
    {
        $query = "SELECT * FROM $table";

        if ($id!=null) {
            $query .= " WHERE $id='".$id_value."'";
        }


        $result = $this->conn->query($query);

        if(!$result) {
            return 'Akontese Erru iha Query!';
        }

        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }


    //To update data
    public function update_data($table, $data, $id, $id_value)
    {
        $query = "UPDATE $table SET ";
        $query .= implode(',', $data);
        $query .= "WHERE $id='".$id_value."'";
        $result = $this->conn->query($query);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    //To delete data
    public function delete_data($table, $id, $id_value)
    {
        $query = "DELETE FROM $table WHERE $id='".$id_value."'";
        $result = $this->conn->query($query);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    //To insert data
    public function insert_data($table_name, $data)
    {
        $string = "INSERT INTO ".$table_name."(";
        $string .= implode(",", array_keys($data)) . ') VALUES (';
        $string .= "'" . implode("','", array_values($data)) . "')";

        if(mysqli_query($this->conn, $string)) {
            return true;
        } else {
            echo mysqli_error($this->conn);
        }
    }


    //To get last id
    public function get_last_id($id, $table)
    {
        $query = "SELECT $id FROM $table ORDER BY $id DESC LIMIT 1";
        $result = $this->conn->query($query);
        $data = mysqli_fetch_array($result);

        return $data['id'];
    }


}

class Stock extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show_stock()
    {

        $sql = "SELECT  t.id_stock,t.stock,t.presu_kada_m,
          s.naran_sasan, s.modelu, s.tinan_produz, s.cc_motor, s.foto, k.kategoria FROM t_stock t,
         t_kategoria k, t_sasan s WHERE t.id_sasan = s.id_sasan AND t.id_kategoria = k.id_kategoria";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function updateStock($id, $value)
    {
        $sql = "UPDATE t_stock SET stock = '$value' WHERE id_stock = '$id'";
        $this->conn->query($sql);
    }

    public function show_dados_stock($id)
    {

        $sql = "SELECT * FROM t_stock WHERE id_stock = '$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }

    public function show_dados_form($id)
    {

        $sql = "SELECT  t.id_stock,t.stock,t.presu_kada_m,
          s.naran_sasan, s.modelu, s.tinan_produz, s.cc_motor, s.foto, k.kategoria FROM t_stock t,
         t_kategoria k, t_sasan s WHERE t.id_sasan = s.id_sasan AND t.id_kategoria = k.id_kategoria AND id_stock='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }
    public function stock_manual()
    {

        $sql = "SELECT SUM(s.stock) as Total_manual FROM t_stock s, t_kategoria k WHERE s.id_kategoria=k.id_kategoria AND k.kategoria='Manual'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data=$row;
            }
            return $data;
        }

    }
    public function stock_metik()
    {

        $sql = "SELECT SUM(s.stock) as Total_metik FROM t_stock s, t_kategoria k WHERE s.id_kategoria=k.id_kategoria AND k.kategoria='Automatico'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data=$row;
            }
            return $data;
        }

    }
}

class kategoria extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show_kategoria()
    {

        $sql = "SELECT * FROM t_kategoria";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }

    public function show_kategoria_form($id)
    {

        $sql = "SELECT * FROM t_kategoria WHERE id_kategoria='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }
}


class transaksaun extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function show_transaksi()
    {

        $sql = "SELECT dayname(f.data_faan) as loron, day(f.data_faan) as dataa,
         monthname(f.data_faan) as fulan, year(f.data_faan) as tinan, f.id_faan,f.data_faan, f.total_hola,t.id_stock,t.stock, t.presu_kada_m, c.naran_cliente, c.sexu, s.naran_sasan,s.modelu,s.cc_motor, s.foto FROM t_faan f,
         t_sasan s,t_stock t, t_cliente c WHERE f.id_stock=t.id_stock AND c.id_cliente=f.id_cliente AND t.id_sasan=s.id_sasan";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }


    public function show_transaksi_dt($date)
    {

        $sql = "SELECT f.id_faan,f.data_faan, f.total_hola,t.id_stock,t.stock, t.presu_kada_m, c.naran_cliente,
         c.sexu, s.naran_sasan,s.modelu,s.cc_motor, s.foto FROM t_faan f, t_sasan s,t_stock t,
         t_cliente c WHERE f.id_stock=t.id_stock AND c.id_cliente=f.id_cliente AND t.id_sasan=s.id_sasan AND f.data_faan='$date'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }

    public function total_presu($id, $data)
    {
        $sql = "UPDATE t_faan SET total_presu='$data' WHERE id_faan = '$id'";
        $this->conn->query($sql);
    }

    public function show_transaksi_form($id)
    {

        $sql = "SELECT f.id_faan,f.data_faan, f.total_hola,t.id_stock,t.stock, t.presu_kada_m, c.naran_cliente,
         c.sexu, s.naran_sasan,s.modelu,s.cc_motor, s.foto FROM t_faan f, t_sasan s,t_stock t,
         t_cliente c WHERE f.id_stock=t.id_stock AND c.id_cliente=f.id_cliente AND t.id_sasan=s.id_sasan AND id_faan = '$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }
    public function incum($data)
    {

        $sql = "SELECT COUNT(id_faan) AS Conta, SUM(total_presu) AS Total FROM t_faan WHERE data_faan='$data'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data=$row;
            }
            return $data;
        }

    }



}

class cliente extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function show_dados_cliente()
    {

        $sql = "SELECT  dayname(c.data_moris) as loron, day(c.data_moris) as dataa,
         monthname(c.data_moris) as fulan, year(c.data_moris) as tinan, c.id_cliente,c.naran_cliente,c.sexu, m.naran_mun,
         p.naran_postu, s.naran_suku, c.data_moris, c.hela_fatin FROM 
         t_cliente c, t_suku s, t_muni m, t_postu p WHERE
          c.id_suku = s.id_suku AND s.id_postu = p.id_postu AND p.id_mun=m.id_mun";

        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }
    public function show_total_cl()
    {
        $sql = "SELECT m.naran_mun, COUNT(*) AS Total_m FROM t_cliente c, t_suku s, t_postu p,
         t_muni m WHERE c.id_suku=s.id_suku AND s.id_postu=p.id_postu AND m.id_mun = p.id_mun GROUP BY m.naran_mun;";

        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }
    public function show_form($id)
    {

        $sql = "SELECT c.id_cliente,c.naran_cliente,c.sexu, m.naran_mun,
         p.naran_postu, s.id_suku, s.naran_suku, c.data_moris, c.hela_fatin FROM 
         t_cliente c, t_suku s, t_muni m, t_postu p WHERE
          c.id_suku = s.id_suku AND s.id_postu = p.id_postu AND p.id_mun=m.id_mun AND c.id_cliente='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }
}

class trabalhador extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function showtbr()
    {

        $sql = "SELECT t.id_tbdor,t.naran_tbdr,t.sexu,t.hela_fatin, t.no_tlf, t.foto, s.naran_suku,p.naran_postu,m.naran_mun FROM
         t_trabalho t, t_muni m, t_postu p, t_suku s WHERE 
         t.id_suku= s.id_suku AND s.id_postu=p.id_postu AND p.id_mun=m.id_mun";

        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }

    public function show_form($id)
    {

        $sql = "SELECT t.id_tbdor, s.id_suku,t.naran_tbdr,t.sexu,t.hela_fatin, t.no_tlf, t.foto, s.naran_suku,p.naran_postu,m.naran_mun FROM
         t_trabalho t, t_muni m, t_postu p, t_suku s WHERE 
         t.id_suku= s.id_suku AND s.id_postu=p.id_postu AND p.id_mun=m.id_mun AND t.id_tbdor='$id'";

        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }
}

class mps extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function showmps()
    {
        $sql = "SELECT * FROM t_suku s, t_muni m, t_postu p WHERE s.id_postu=p.id_postu AND p.id_mun=m.id_mun";

        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }
    }

    public function mun()
    {

        $sql = "SELECT * FROM t_muni";

        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }
    public function suku()
    {

        $sql = "SELECT * FROM t_suku";

        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }
    public function postu()
    {

        $sql = "SELECT * FROM t_postu";

        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row=$query->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }

    }
}