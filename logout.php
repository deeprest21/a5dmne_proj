<?php
// بدء الجلسة
session_start();

// إفراغ جميع المتغيرات المخزنة في الجلسة
$_SESSION = array();

// إذا كانت متغيرات الكوكيز موجودة، حذفها أيضًا
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time() - 42000, '/');
}

// تدمير الجلسة
session_destroy();

// إعادة توجيه المستخدم إلى صفحة تسجيل الدخول أو أي صفحة أخرى
header('Location: login.php');
exit;
?>