<?php
require __DIR__ . '/parts/connect_db.php';
$pageName = 'loginAdmin';
?>
<?php
include __DIR__ . '/parts/html-head.php'; ?>
<?php
include __DIR__ . '/parts/nav-bar-admin.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Admin Login</h5>
                    <form name="formAdminLogin" onsubmit="checkForm(); return false;">
                        <div class="mb-3">
                            <label for="account" class="form-label">Account</label>
                            <input type="text" class="form-control" id="account" name="account">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-light">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include __DIR__ . '/parts/scripts.php'; ?>
<script>
    function checkForm() {
        const fd = new FormData(document.formAdminLogin);

        fetch('login-api-admin.php', {
                method: 'POST',
                body: fd,
            })
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
                if (obj.success) {
                    location.href = 'basepage-admin.php';
                } else {
                    alert(obj.error);
                }
            })
    }
</script>
<?php
include __DIR__ . '/parts/html-foot.php'; ?>