<?php
ob_start();
session_start();
include "model/taikhoan.php";
include "model/pdo.php";
include "view/header.php";
include "view/global.php";
include "model/sanpham.php";

if(!isset($_SESSION["giohang"]))
$_SESSION["giohang"] = [];

$spnew = loadall_sanpham_home();
$recom = load_sanpham_home();

if (isset($_GET['act']) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {
           // đăng nhập
        case 'dangnhap':
            if (isset($_POST['dangnhap'])) {    
                $ten_tk = $_POST['ten_tk'];
                $matkhau = $_POST['matkhau'];
                $checkuser = ktra_tk($ten_tk, $matkhau);



                if (is_array($checkuser)&& $checkuser['ma_vaitro'] == 3) {
                    // Nếu đúng tài khoản và vai trò là 3, thì đăng nhập
                    $_SESSION['user'] = $checkuser;
                    header('location:index.php');

                } else {

                    echo "Nhập sai hoặc tài khoản không tồn tại hoặc không có quyền truy cập. Vui lòng kiểm tra lại";
                }
              
            }
            include "view/login.php";
            break;
          // đăng ksy tài khoản
        case 'dangky':
            if (isset($_POST['dangky']) ) {
                $ten_tk = $_POST['ten_tk'];
                $matkhau = $_POST['matkhau'];
                $email = $_POST['email'];
                dangky_tk($ten_tk, $matkhau, $email);
                $thongbao = "dang ky thanh cong tai khoan " . $ten_tk;
                header('location: index.php?act=dangnhap');
            }
            include "view/dangky.php";
            break;
            // đăng xuất tài khoản
        case 'dangxuat';
            session_unset();
            header('location: index.php');
            break;

          // trang chu  
        case 'sanpham';
        if (isset($_POST['kyw']) && ($_POST['kyw'] > 0)) {
            $kyw = $_POST['kyw'];
        } else {
            $kyw = "";
        }
        if (isset($_GET['ma_dm']) && ($_GET['ma_dm'] > 0)) {
            $ma_dm = $_GET['ma_dm'];

        } else {
            $ma_dm = 0;
        }
        $tendm = load_tendm($ma_dm);
        $dssp = loadall_sanpham($kyw, $ma_dm);
            include "view/sanpham.php";
            break;
            case 'addtocart':
    // Lấy dữ liệu từ form để lưu vào giỏ hàng
    if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
        $id = $_POST['ma_sp'];
        $tensp = $_POST['ten_sp'];
        $img = $_POST['img'];
        $gia = $_POST['gia'];
        $sl = 1;

        // Kiểm tra xem $_SESSION['giohang'] có tồn tại và có phải một mảng không
        if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
            $found = false;
            foreach ($_SESSION['giohang'] as &$item) {
                if ($item[0] === $id) {
                    $item[4] += $sl; // Tăng số lượng sản phẩm
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                // Nếu sản phẩm không tồn tại trong giỏ hàng, thêm sản phẩm mới vào
                $item = array($id, $tensp, $img, $gia, $sl);
                $_SESSION['giohang'][] = $item;
            }
        } else {
            // Nếu $_SESSION['giohang'] chưa tồn tại hoặc không phải mảng, khởi tạo lại
            $_SESSION['giohang'] = array();
            $item = array($id, $tensp, $img, $gia, $sl);
            $_SESSION['giohang'][] = $item;
        }
    }
include './view/cart.php';
    break;
          case'delcart':
            if(isset( $_SESSION['giohang']))unset( $_SESSION['giohang']);
    header('location:index.php?act=cart');
        break;
        // case 'cart_up':
        //     if (isset($_GET['ma_sp'])) {
        //         $id = $_GET['ma_sp'];
        //         foreach ($_SESSION['giohang'] as &$item) {
        //             if ($item[0] == $id) {
        //                 $item[4]++; // Tăng số lượng sản phẩm
        //                 break;
        //             }
        //         }
        //     }
        //     include "view/cart.php";
        //     break;
    
        // case 'cart_down':
        //     if (isset($_GET['ma_sp'])) {
        //         $id = $_GET['ma_sp'];
        //         foreach ($_SESSION['giohang'] as &$item) {
        //             if ($item[0] == $id && $item[4] > 1) {
        //                 $item[4]--; // Giảm số lượng sản phẩm
        //                 break;
        //             }
        //         }
        //     }
        //     include "view/cart.php";
        //     break;
   

        default:
            include "view/home.php";
            break;
    }


} else {
    include "view/home.php";
}


include "view/footer.php";
ob_start();
?>