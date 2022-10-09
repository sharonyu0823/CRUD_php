<?php include __DIR__ . '/parts/connect_db.php';

$pageName = 'mb_login';
?>

<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/nav-bar-no-admin.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 fw-bolder">登入</h5>

                    <!-- 表單填寫 -->
                    <form name="mbLoginForm" onsubmit="checkForm(); return false;" novalidate>
                        <div class="mb-3">
                            <label for="mblAccount" class="form-label">帳號</label>
                            <input type="email" class="form-control" name="mblAccount" id="mblAccount">
                        </div>
                        <div class="mb-4">
                            <label for="mblPassword" class="form-label">密碼</label>
                            <input type="password" class="form-control" name="mblPassword" id="mblPassword">
                        </div>
                        <button type="submit" class="btn btn-primary">登入</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/scripts.php'; ?>

<script>
    function checkForm() {
        const fd_l = new FormData(document.mbLoginForm);

        fetch('05-mb_login_api.php', {
                method: 'POST',
                body: fd_l,
            })
            .then(r => r.json())
            .then(obj_l => {
                console.log(obj_l);
                if (!obj_l.success) {
                    alert(obj_l.error);
                } else {
                    alert('登入成功');
                    location.href = '00-basepage-no-admin.php';;
                }

            })

    }
</script>

<?php include __DIR__ . '/parts/html-foot.php'; ?>