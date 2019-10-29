<?php 
// khai báo thông tin host và database
$dns = "mysql:host=localhost;dbname=bkap";
// các cấu hình khác
$options = [
    // hiển thị và thêm mói thiếng việt có dấu
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
    //Hienr thị lỗi kiểu Exception
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];
// đặt lệnh kết nối trong try... catch
try {
    $conn = new PDO($dns,'root','',$options);
} catch (PDOException $e) {
    // Hiển thị lỗi nếu có lỗi kết nối
    echo $e->getMessage(); die;
}

function getAll($args = []){
    global $conn;

    $table = isset($args['table']) ? $args['table'] : '';
    $orderBy = isset($args['orderBy']) ? $args['orderBy'] : 'id';
    $where = isset($args['where']) ? $args['where'] : false;
    $orderCompare = isset($args['orderCompare']) ? $args['orderCompare'] : 'ASC';
    $rand = isset($args['rand']) ? true : false;
    $limit = isset($args['limit']) ? $args['limit'] : false;
    $sql = "SELECT * FROM $table ";
    if ($where) {
        $sql .= " WHERE $where ";
    }
    if ($rand) {
        $sql .= " Order By RAND()";
        if ($limit) {
             $sql .= " LIMIT $limit";
        }
    }else{
        $sql .= " Order By $orderBy $orderCompare ";
        
        if ($limit) {
             $sql .= " LIMIT $limit ";
        }
    }
    
    // echo $sql;
    $stm = $conn->prepare($sql);
    // Kiểu dữ liệu được duyệt
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $stm->execute(); // thực hiện truy vấn
    $result = $stm->fetchAll(); // duyệt tất cả dữ liệu

    return $result;
}

function getById($args = []){
    global $conn;
    $table = isset($args['table']) ? $args['table'] : '';
    $key = isset($args['key']) ? $args['key'] : 'id';
    $value = isset($args['value']) ? $args['value'] : 0;
    $stm = $conn->prepare("SELECT * FROM $table WHERE $key = '$value'");
    $stm->execute(); // thực hiện truy vấn
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stm->fetch(); // duyệt tất cả dữ liệu

    return $result;
}

function execuSql($sql,$data){
    global $conn;
    $id = 0;
    $stm = $conn->prepare($sql);

    try {
        $conn->beginTransaction();
        $stm->execute($data);
        $id = $conn->lastInsertId();
        $conn->commit();
    } catch(PDOExecption $e) {
        $id = -1;
        $conn->rollback();
    }

    return $id;
}


$cats = getAll(['table' => 'category']); // duyệt tất cả dữ liệu

function get_cart(){
    return $carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
}

function totalQtt(){
    $total = 0;
    
    foreach (get_cart() as $cart) {
        $total +=  $cart['quantity'];
    }

    return $total;
}

function totalPrice(){
    $total = 0;
    
    foreach (get_cart() as $cart) {
        $total +=  $cart['quantity'] * $cart['price'];
    }
    return $total;
}

function getPromo(){
    $value = 0;
    if (isset($_SESSION['promo'])) {
        $value = $_SESSION['promo'];
    }

    return $value;
}
function caculPromo($total,$promo){
    $p = 0;
    $p = $total - ($total*$promo/100);
    return $p;
}

function totalPricePromo(){
    $total = totalPrice();
    $p = 0;
    $p = $total - ($total*getPromo()/100);
    return $p;
}

function get_promo(){
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdfgheyrtwkglyokjshsjdkflf";
    $res = "";
    for ($i = 0; $i < 8; $i++) {
        $res .= $chars[mt_rand(0, strlen($chars)-1)];
    }
    return strtoupper($res);
}
?>
