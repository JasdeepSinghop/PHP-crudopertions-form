$(document).ready(function () {
    $("#frm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            address: {
                required: true,
                minlength: 5
            },
            dob: {
                required: true,
                date: true
            },
            gender: {
                required: true
            },
            // "images[]": {
            //     required: true,
            //     extension: "jpg|jpeg|png|gif"
            // }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Name must be at least 3 characters long"
            },
            email: {
                required: "Please enter your email",
                email: "Enter a valid email address"
            },
            address: {
                required: "Please enter your address",
                minlength: "Address must be at least 5 characters long"
            },
            dob: {
                required: "Please enter your date of birth",
                date: "Enter a valid date"
            },
            gender: {
                required: "Please select your gender"
            },
            // "images[]": {
            //     required: "Please upload at least one image",
            //     extension: "Only JPG, JPEG, PNG, and GIF files are allowed"
            // }
        },
        errorElement: "div",
        errorClass: "text-danger",
        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        }
    });
});
