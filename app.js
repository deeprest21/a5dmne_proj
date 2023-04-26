
// تعريف متغير لتخزين حالة تسجيل الدخول
var isLoggedIn = false;

// دالة لتسجيل الدخول
function login() {
  // تنفيذ الأوامر الخاصة بتسجيل الدخول
  // ...
  
  // تغيير حالة تسجيل الدخول إلى "متصل"
  isLoggedIn = true;
  
  // إظهار زر تسجيل الخروج في الصفحة الرئيسية
  showLogoutButton();
}

// دالة لتسجيل الخروج
function logout() {
  // تنفيذ الأوامر الخاصة بتسجيل الخروج
  // ...
  
  // تغيير حالة تسجيل الدخول إلى "غير متصل"
  isLoggedIn = false;
  
  // إخفاء زر تسجيل الخروج في الصفحة الرئيسية
  hideLogoutButton();
}

// دالة لإظهار زر تسجيل الخروج في الصفحة الرئيسية
function showLogoutButton() {
  var logoutButton = document.getElementById('logoutButton');
  logoutButton.style.display = 'block';
}

// دالة لإخفاء زر تسجيل الخروج في الصفحة الرئيسية
function hideLogoutButton() {
  var logoutButton = document.getElementById('logoutButton');
  logoutButton.style.display = 'none';
}
// تنفيذ الأوامر الخاصة بعرض أو إخفاء زر تسجيل الخروج عند تحميل الصفحة
if (isLoggedIn) {
  showLogoutButton();
} else {
  hideLogoutButton();
}

if (localStorage.getItem('loggedIn')) {
  const logoutButton = document.createElement('button');
  logoutButton.textContent = 'تسجيل الخروج';
  logoutButton.addEventListener('click', () => {
    // إجراءات تسجيل الخروج
    localStorage.removeItem('loggedIn'); // حذف علامة تسجيل الدخول من التخزين المحلي
    window.location.href = 'login.html'; // تحويل المستخدم إلى صفحة تسجيل الدخول
  });

  const header = document.querySelector('header');
  header.appendChild(logoutButton); // إضافة الزر إلى عنصر header
}
