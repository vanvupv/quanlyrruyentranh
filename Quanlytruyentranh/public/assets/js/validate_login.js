// $(document).ready(function () {
//   // Bước 2: Xây dựng Hàm Thông báo
//
//   // Hàm Thông báo Lỗi
//   const showError = (input, message) => {
//     let sibling = input.siblings("div.error-span");
//     sibling.addClass("active").text(message);
//     console.log(">>>Check Sibling: ", sibling);
//   };
//
//   // Hàm Thông báo Thành công
//   const showSuccess = (input, message) => {
//     let sibling = input.siblings("div.error-span");
//     sibling.addClass("active").text(message);
//     console.log(">>>Check Sibling: ", sibling);
//   };
//
//   // Hàm Kiểm tra rỗng
//   const chekEmpty = (input) => {
//     let inp = input.val().trim();
//     if (!inp) {
//       return true;
//     } else return false;
//   };
//
//   // Hàm Check Email
//   const checkEmail = (input) => {
//     const regexEmail = /[a - zA - Z0 - 9]/;
//     let inpt = input.val().trim();
//     if (!regexEmail.test(inpt)) {
//       return true;
//     } else return false;
//   };
//
//   // Hàm Check Length
//   const checkLeng = (input) => {
//     let inpt = input.val().trim();
//     if (inpt.length < 6) {
//       return true;
//     } else return false;
//   };
//   // Hàm Validate
//   $("#username").on("input", validateForm);
//
//   function validateForm() {
//     // Bước 1: Lấy Giá Trị Từ Các Ô Input
//     let username1 = $("#username");
//     let username = $("#username").val();
//     let password = $("#password").val();
//
//     console.log(">>>Check user: ", username);
//     console.log(">>>Check passwd: ", password);
//
//     // showError(username1, "UserName Success!");
//     // Kiểm tra Rỗng
//     if (chekEmpty(username1)) {
//       showError(username1, "UserName Required!");
//       // return;
//     }
//     // Kiểm tra Tài khoản
//     else if (checkEmail(username1)) {
//       showError(username1, "UserName Error!");
//       // return;
//     }
//     // Kiểm tra Chiều dài
//     else if (checkLeng(username1)) {
//       showError(username1, "User Name Length!");
//     }
//     // Thành Công!
//     else {
//       showSuccess(username1, "UserName Success!");
//     }
//   }
// });
