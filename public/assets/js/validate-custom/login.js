// $(document).ready(function () {
//   // Xử lý sự kiện khi nhấp vào nút "Đăng Nhập"
//   $("#loginBtn").click(function () {
//     $(this).removeClass("css-load").addClass("css-loading");
//     $("#loginLoading").css("display", "inline-block");

//     // Tạo một Promise
//     const loginPromise = new Promise((resolve) => {
//       setTimeout(function () {
//         const username = $("#username").val();
//         const password = $("#password").val();

//         // Perform login logic here
//         // Example: Check username and password, and redirect if login is successful
//         if (username === "229665" && password === "password") {
//           alert("Đăng nhập thành công!");
//           // Redirect to another page or perform other actions
//           // window.location.href = 'http://127.0.0.1:5500/Project_CaNhan/home.html'
//           window.location.href = "home.html";
//         } else {
//           alert(
//             "Đăng nhập thất bại. Vui lòng kiểm tra lại tên đăng nhập và mật khẩu."
//           );
//         }

//         // Gọi resolve khi công việc trong setTimeout hoàn thành
//         resolve();
//       }, 3000);
//     });

//     // Khi Promise được giải quyết (resolve), thực hiện console.log
//     loginPromise.then(() => {
//       console.log(">>> Check it!");
//       $(this).removeClass("css-loading").addClass("css-load");
//       $("#loginLoading").css("display", "none");
//     });
//   });

//   // Xử lý sự kiện khi nhấp vào hình con mắt để hiển thị/ẩn mật khẩu
//   $("#togglePassword").click(function () {
//     const passwordInput = $("#password");
//     const icon = $(this).find("i");

//     if (passwordInput.attr("type") === "password") {
//       passwordInput.attr("type", "text");
//       icon.removeClass("bi bi-eye-slash").addClass("bi bi-eye");
//     } else {
//       passwordInput.attr("type", "password");
//       icon.removeClass("bi bi-eye").addClass("bi bi-eye-slash");
//     }
//   });

//   //
//   $("#username").on("input", function () {
//     const username = $("#username").val();
//     const password = $("#password").val();

//     const regex = /^[0-9]+$/;

//     if (regex.test(username) && password) {
//       $("#loginBtn").attr("disabled", false);
//     } else {
//       $("#loginBtn").prop("disabled", true);
//     }
//   });

//   $("#username").on("change", function () {
//     const username = $("#username").val();

//     const regex = /^[0-9]+$/;

//     if (regex.test(username) && password) {
//       $("#loginBtn").attr("disabled", false);
//     } else {
//       $("#loginBtn").prop("disabled", true);
//     }
//   });

//   $("#password").on("input", function () {
//     const passwordValue = $(this).val();
//     $(this).attr("value", passwordValue);

//     //
//     const username = $("#username").val();
//     const password = $("#password").val();

//     const regex = /^[0-9]+$/;

//     if (regex.test(username) && password) {
//       $("#loginBtn").attr("disabled", false);
//     } else {
//       $("#loginBtn").prop("disabled", true);
//     }
//   });

//   $("#username").on("change", function () {
//     // const username = $("#username").val();
//     // const errorDiv = $(this).siblings();
//     // console.log(">>> Check error: ",errorDiv);
//     // const regex = /^[0-9]+$/;

//     // if (regex.test(username) && password) {
//     $(".username div[type='error']")
//       .addClass("error-active")
//       .text("Nhap so dien thoai hop le");
//     // errorDiv.addClass("error-active").text("Nhap so dien thoai hop le");

//     // } else {
//     // $('#loginBtn').prop('disabled',true);
//     // }
//   });

//   //   Valiate Form
// });
