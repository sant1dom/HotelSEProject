@extends('layouts.mainlayout')

@section('content')

    <button type="button" class="btn btn-lg fa fa-plus shadow-none"
            onClick="addFormFun(0)">
    </button>
    <button type="button" class="btn btn-lg fa fa-minus shadow-none"
            onClick="removeFormFun(0)">
    </button>

    <script>
        var down = document.getElementById("BottomLine");
        var child = [];
        var count = 0;

        function addFormFun($n) {

            // Create a form synamically
            var form = document.createElement("form");

            // Create an input element for emailID
            var ID = document.createElement("input");
            ID.setAttribute("type", "text");
            ID.setAttribute("name", "emailID");
            ID.setAttribute("placeholder", "E-Mail ID");

            // Create an input element for password
            var PWD = document.createElement("input");
            PWD.setAttribute("type", "password");
            PWD.setAttribute("name", "password");
            PWD.setAttribute("placeholder", "Password");

            // Append the email_ID input to the form
            form.append(ID);

            // Append the password to the form
            form.append(PWD);

            document.getElementsByTagName("body")[$n]
                .appendChild(form);
            child[count++] = form;

        }

        function RemoveFormFun() {
            document.getElementsByTagName("body")[0].removeChild(child[--count]);
        }
    </script>


@endsection
