   //Rule

   // ---------alphanumeric ------ chữ cái, chữ số và dấ gạch dưới
   $.validator.addMethod("alphanumeric", function(value, element) {
       return this.optional(element) || /^\w+$/i.test(value);
   }, "Chỉ bao gồm chữ cái, chữ số và dấu gạch dưới.");
   //-----------TK --------
   $.validator.addMethod("lettersonly", function(value, element) {
       return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
   }, "Chỉ bao gồm chữ cái và dấu cách");

   $.validator.addMethod("phone", function(value, element) {
       return this.optional(element) || /^0[0-9]{9}$/i.test(value);
   }, "Số điện thoại gồm các chữ số bắt đầu là 0 với độ dài là 10.");

   $.validator.addMethod("gmail", function(value, element) {
       return this.optional(element) || /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i.test(value);
   }, "Email không hợp lệ");
   // Service
   $(function() {
       $('.service').validate({
           rules: {
               Service_name: {
                   required: true,
                   minlength: 2,
                   maxlength: 50
               },
               Service_unit: {
                   required: true,
                   minlength: 2,
                   maxlength: 50
               },
               Service_desc: {
                   required: true,
                   minlength: 2,
                   maxlength: 255
               },
               Service_price: {
                   required: true,
                   minlength: 3,
                   digits: true
               }
           },
           messages: {
               Service_name: {
                   required: "Dữ liệu không được để trống",
                   minlength: "Độ dài tối thiểu là 2",
                   maxlength: "Độ dài tối đa là 50"
               },
               Service_unit: {
                   required: "Dữ liệu không được để trống",
                   minlength: "Độ dài tối thiểu là 2",
                   maxlength: "Độ dài tối đa là 50"
               },
               Service_desc: {
                   required: "Dữ liệu không được để trống",
                   minlength: "Độ dài tối thiểu là 2",
                   maxlength: "Độ dài tối đa là 255"
               },
               Service_price: {
                   required: "Dữ liệu không được để trống",
                   minlength: "Độ dài tối thiểu là 3",
                   digits: "Bạn cần nhâp vào kiểu số nguyên dương"
               }
           }
       });

   });
   //Room
   $(function() {
       $('.room').validate({
           rules: {
               Room_name: {
                   required: true,
                   minlength: 2,
                   maxlength: 50
               },
               Room_address: {
                   required: true,
                   minlength: 2,
                   maxlength: 100
               },
               Room_type: {
                   required: true
               },
               Room_price: {
                   required: true,
                   minlength: 3,
                   digits: true
               },
               Room_acreage: {
                   required: true,
                   minlength: 2,
                   digits: true
               },
               Number_people: {
                   required: true
               }
           },
           messages: {
               Room_name: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 2.",
                   maxlength: "Độ dài tối đa là 50."
               },
               Room_address: {
                   required: "Dữ liệu không được để trống",
                   minlength: "Độ dài tối thiểu là 2.",
                   maxlength: "Độ dài tối đa là 100."
               },
               Room_type: {
                   required: "Vui lòng chọn loại phòng."
               },
               Room_price: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 3.",
                   digits: "Bạn cần nhâp vào kiểu số nguyên dương."
               },
               Room_acreage: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ Dài tối thiểu là 2.",
                   digits: "Vui lòng nhập vào số nguyên dương."
               },
               Number_people: {
                   required: "Vui lòng chọn số người ở."
               }
           }
       });
   });
   //facilities
   $(function() {
       $('.facilities').validate({
           rules: {
               Facilities_name: {
                   required: true,
                   minlength: 2,
                   maxlength: 50
               },
               Facilities_brand: {
                   required: true,
                   minlength: 2,
                   maxlength: 100
               },
               Facilities_quantity: {
                   required: true,
                   minlength: 1,
                   digits: true
               }
           },
           messages: {
               Facilities_name: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 2.",
                   maxlength: "Độ dài tối đa là 50."
               },
               Facilities_brand: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 2.",
                   maxlength: "Độ dài tối đa là 100."
               },
               Facilities_quantity: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu 1 chữ số.",
                   digits: "Vui lòng nhập vào số nguyên dương."
               }
           }
       });
   });
   //Bill
   $(function() {
       $('.bill').validate({
           rules: {
               Bill_name: {
                   required: true,
                   minlength: 2,
                   maxlength: 100
               },
               Room_id: {
                   required: true
               },
               Bill_create: {
                   required: true
               }
           },
           messages: {
               Bill_name: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 2.",
                   maxlength: "Độ dài tối đa là 100."
               },
               Room_id: {
                   required: "Vui lòng chọn mã phòng."
               },
               Bill_create: {
                   required: "Vui lòng chọn ngày lập hóa đơn"
               }
           }
       });
   });
   //Bill-Service
   $(function() {
       $('.bill-service').validate({
           rules: {
               Bill_id: {
                   required: true
               },
               Service_id: {
                   required: true
               },
               Old_index: {
                   digits: true
               },
               New_index: {
                   digits: true
               }
           },
           messages: {
               Bill_id: {
                   required: "Vui lòng chọn mã hóa đơn.",
               },
               Service_id: {
                   required: "Vui lòng chọn tên dịch vụ.",
               },
               Old_index: {
                   digits: "Bạn cần nhâp vào kiểu số nguyên dương."
               },
               New_index: {
                   digits: "Bạn cần nhâp vào kiểu số nguyên dương."
               }

           }
       });

   });
   //Res-staff
   $(function() {
       $('.res-staff').validate({
           rules: {
               Student_id: {
                   required: true
               },
               Registration_create: {
                   required: true
               },
               NumberOfMonth: {
                   required: true
               }
           },
           messages: {
               Student_id: {
                   required: "Vui lòng chọn sinh viên."
               },
               Registration_create: {
                   required: "Vui lòng chọn ngày đăng ký."
               },
               NumberOfMonth: {
                   required: "Vui lòng chọn số tháng ở."
               }
           }
       });
   });

   //Student
   $(function() {
       $('.st').validate({
           rules: {
               User_acount: {
                   required: true,
                   alphanumeric: true,
                   minlength: 6,
                   maxlength: 30
               },
               User_password: {
                   required: true,
                   minlength: 6,
                   maxlength: 35
               },
               User_name: {
                   required: true,
                   minlength: 2,
                   maxlength: 50
               },
               Date_of_birth: {
                   required: true
               },
               User_address: {
                   required: true,
                   minlength: 2,
                   maxlength: 50
               },
               User_email: {
                   required: true,
                   email: true,
                   gmail: true,
               },
               User_folk: {
                   required: true,
                   minlength: 2,
                   maxlength: 50
               },
               User_phone: {
                   required: true,
                   phone: true
               },
               Student_class: {
                   required: true,
                   minlength: 2,
                   maxlength: 50
               },
               Student_faculty: {
                   required: true,
                   minlength: 2,
                   maxlength: 50
               }
           },
           messages: {
               User_acount: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 6 ký tự.",
                   maxlength: "Độ dài tối đa là 30 ký tự."
               },
               User_password: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 6 ký tự.",
                   maxlength: "Độ dài tối đa là 35 ký tự."
               },
               User_name: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 2 ký tự.",
                   maxlength: "Độ dài tối đa là 50 ký tự."
               },
               Date_of_birth: {
                   required: "Vui lòng chọn ngày tháng năm sinh.",
               },
               User_address: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 2 ký tự.",
                   maxlength: "Độ dài tối đa là 50 ký tự."
               },
               User_email: {
                   required: "Dữ liệu không được để trống.",
                   email: "Địa chỉ email không hợp lệ ",
                   gmail: "Vui lòng nhập đúng định dạng email VD: abc@gmail.com",
               },
               User_folk: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 2 ký tự.",
                   maxlength: "Độ dài tối đa là 50 ký tự."
               },
               User_phone: {
                   required: "Dữ liệu không được để trống."
               },
               Student_class: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 2 ký tự.",
                   maxlength: "Độ dài tối đa là 50 ký tự."
               },
               Student_faculty: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 2 ký tự.",
                   maxlength: "Độ dài tối đa là 50 ký tự."
               }
           }
       });
   });
   //Staff
   $(function() {
       $('.staff').validate({
           rules: {
               User_acount: {
                   required: true,
                   alphanumeric: true,
                   minlength: 6,
                   maxlength: 30
               },
               User_password: {
                   required: true,
                   minlength: 6,
                   maxlength: 35
               },
               User_name: {
                   required: true,
                   minlength: 2,
                   maxlength: 50
               },
               Date_of_birth: {
                   required: true
               },
               User_address: {
                   required: true,
                   minlength: 2,
                   maxlength: 255
               },
               User_email: {
                   required: true,
                   email: true,
                   gmail: true,
               },
               User_folk: {
                   required: true,
                   minlength: 2,
                   maxlength: 50
               },
               User_phone: {
                   required: true,
                   phone: true
               },
               Staff_type: {
                   required: true
               }
           },
           messages: {
               User_acount: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 6 ký tự.",
                   maxlength: "Độ dài tối đa là 30 ký tự."
               },
               User_password: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 6 ký tự.",
                   maxlength: "Độ dài tối đa là 35 ký tự."
               },
               User_name: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 2 ký tự.",
                   maxlength: "Độ dài tối đa là 64 ký tự."
               },
               Date_of_birth: {
                   required: "Vui lòng chọn ngày tháng năm sinh.",
               },
               User_address: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 2 ký tự.",
                   maxlength: "Độ dài tối đa là 255 ký tự."
               },
               User_email: {
                   required: "Dữ liệu không được để trống.",
                   email: "Địa chỉ email không hợp lệ ",
                   gmail: "Vui lòng nhập đúng định dạng email VD: abc@gmail.com",
               },
               User_folk: {
                   required: "Dữ liệu không được để trống.",
                   minlength: "Độ dài tối thiểu là 2 ký tự.",
                   maxlength: "Độ dài tối đa là 50 ký tự."
               },
               User_phone: {
                   required: "Dữ liệu không được để trống."
               },
               Staff_type: {
                   required: "Vui lòng chọn loại nhân viên."
               }
           }
       });
   });
   //Login
   $(function() {
       $('.login').validate({
           rules: {
               User_acount: {
                   required: true,
                   alphanumeric: true,
                   minlength: 6,
                   maxlength: 64
               },
               User_password: {
                   required: true,
                   minlength: 6,
                   maxlength: 35
               }
           },
           messages: {
               User_acount: {
                   required: "Tài khoản không được để trống.",
                   minlength: "Độ dài tối thiểu là 6 ký tự.",
                   maxlength: "Độ dài tối đa là 64 ký tự."
               },
               User_password: {
                   required: "Mật khẩu không được để trống.",
                   minlength: "Độ dài tối thiểu là 6 ký tự.",
                   maxlength: "Độ dài tối đa là 35 ký tự."
               }
           }
       });
   });