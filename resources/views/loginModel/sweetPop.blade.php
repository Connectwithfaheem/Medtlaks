<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
    function confirmLogout() {
        Swal.fire({
            title: "Are you sure?",
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, logout"
        }).then((result) => {
            if (result.isConfirmed) {
                // If user clicks 'Yes', submit the form to perform logout
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>

<h2>Logout</h2>
<p>Click the link below to logout:</p>

<form id="logout-form" action="{{ url('logout') }}" method="post">
    @csrf
    <a href="javascript:void(0)" onclick="confirmLogout()">Logout</a>
</form>

</body>
</html>
