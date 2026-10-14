
<?php
include "koneksi.php";
session_start();

if ($_SESSION['status'] <> "sukses") {
    header("Location: ../logout.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
/* ============================================================
   Sistem Akademik — Deep Space Theme
   Void black sky, drifting starfield, soft nebula clouds.
   Each dashboard module reads as a distinct celestial body
   rather than one repeated neon accent.
   ============================================================ */

:root{
    --bg-void:      #05070d;
    --bg-void-2:    #080b16;
    --bg-surface:   #0e1424;
    --bg-surface-2: #141b30;
    --bg-surface-3: #1b2440;

    --border-soft:  rgba(120,150,255,.14);
    --border-glow:  rgba(120,170,255,.5);

    --accent-earth:   #4f8cff;
    --accent-mars:    #f97a4d;
    --accent-saturn:  #f2c14e;
    --accent-nebula:  #e879c9;
    --accent-aurora:  #22d3ee;
    --accent-violet:  #7c6cf6;

    --text-primary: #eef1fb;
    --text-muted:   #9aa3c4;
    --text-faint:   #616b8e;

    --shadow-glow: 0 0 0 1px var(--border-soft), 0 20px 45px -18px rgba(30,50,120,.6);
    --radius-lg: 18px;
    --radius-md: 12px;

    --font-display: 'Sora', sans-serif;
    --font-body:    'Inter', sans-serif;
}

body{
    background-color: var(--bg-void);
    background-image:
        radial-gradient(circle at 15% 8%, rgba(79,140,255,.16) 0%, transparent 38%),
        radial-gradient(circle at 85% 92%, rgba(232,121,201,.12) 0%, transparent 42%),
        radial-gradient(1.5px 1.5px at 10% 20%, #fff, transparent),
        radial-gradient(1.5px 1.5px at 80% 10%, #fff, transparent),
        radial-gradient(1px 1px at 40% 65%, #cfe0ff, transparent),
        radial-gradient(1.5px 1.5px at 65% 35%, #fff, transparent),
        radial-gradient(1px 1px at 92% 55%, #cfe0ff, transparent),
        radial-gradient(1px 1px at 25% 85%, #fff, transparent),
        radial-gradient(1.5px 1.5px at 55% 90%, #cfe0ff, transparent),
        radial-gradient(1px 1px at 5% 55%, #fff, transparent);
    background-size: auto, auto, 220px 220px, 220px 220px, 220px 220px, 220px 220px,
                      220px 220px, 220px 220px, 220px 220px, 220px 220px;
    background-repeat: no-repeat, no-repeat, repeat, repeat, repeat, repeat, repeat, repeat, repeat, repeat;
    background-attachment: fixed;
    color: var(--text-primary);
    font-family: var(--font-body);
    animation: twinkle 6s ease-in-out infinite alternate;
}
@keyframes twinkle{
    from{ background-color: var(--bg-void); }
    to{ background-color: var(--bg-void-2); }
}
@media (prefers-reduced-motion: reduce){
    body{ animation: none; }
}

h1,h2,h3,h4,h5,.navbar-brand,.logo-badge{
    font-family: var(--font-display);
}

a{ color: var(--accent-aurora); }
a:hover{ color: var(--accent-nebula); }

::selection{ background: var(--accent-violet); color:#fff; }

.text-primary{ color: var(--accent-earth) !important; }
.text-success{ color: var(--accent-mars) !important; }
.text-warning{ color: var(--accent-saturn) !important; }
.text-danger{  color: var(--accent-nebula) !important; }
.text-muted{   color: var(--text-muted) !important; }

.card{
    background: linear-gradient(180deg, var(--bg-surface-2), var(--bg-surface));
    border: 1px solid var(--border-soft);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-glow);
    position: relative;
    overflow: hidden;
    color: var(--text-primary);
}
.card::before{
    content:"";
    position:absolute; top:0; left:0; right:0; height:3px;
    background: linear-gradient(90deg, var(--accent-earth), var(--accent-violet), var(--accent-aurora));
}

h2, .title{
    color: var(--text-primary);
    font-weight: 700;
    letter-spacing: -.01em;
}
h2 i, .title i{
    background: linear-gradient(135deg, var(--accent-earth), var(--accent-nebula));
    -webkit-background-clip: text; background-clip: text; color: transparent;
    margin-right: .45rem;
}

.btn{
    border-radius: 10px;
    font-weight: 600;
    border: none;
    transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
}
.btn-primary{
    background: linear-gradient(135deg, var(--accent-earth), var(--accent-violet));
    border-color: transparent;
    box-shadow: 0 8px 20px -8px rgba(79,140,255,.7);
}
.btn-primary:hover{
    background: linear-gradient(135deg, var(--accent-aurora), var(--accent-violet));
    box-shadow: 0 12px 28px -8px rgba(34,211,238,.6);
    transform: translateY(-1px);
    border-color: transparent;
}
.btn-secondary{
    background: var(--bg-surface-3);
    color: var(--text-primary);
    border: 1px solid var(--border-soft);
}
.btn-secondary:hover{
    background: var(--bg-surface-2);
    border-color: var(--border-glow);
    color: #fff;
    transform: translateY(-1px);
}
.btn-warning{
    background: linear-gradient(135deg, var(--accent-saturn), #d89b1f);
    color: #241705;
    border-color: transparent;
}
.btn-warning:hover{
    box-shadow: 0 10px 24px -8px rgba(242,193,78,.6);
    transform: translateY(-1px);
    color:#241705;
}
.btn-danger{
    background: linear-gradient(135deg, var(--accent-mars), #c8451f);
    border-color: transparent;
}
.btn-danger:hover{
    box-shadow: 0 10px 24px -8px rgba(249,122,77,.6);
    transform: translateY(-1px);
}
.btn-print, .btn-excel{
    background: linear-gradient(135deg, var(--accent-aurora), #0e93a8) !important;
    color: #04222a !important;
    border: none !important;
}
.btn-print:hover, .btn-excel:hover{
    box-shadow: 0 10px 24px -8px rgba(34,211,238,.6);
    transform: translateY(-1px);
}
.btn-lg{ border-radius: 12px; }

.form-label{
    color: var(--text-muted);
    font-weight: 600;
    font-size: .88rem;
    text-transform: uppercase;
    letter-spacing: .04em;
}
.form-control, .form-select{
    background: var(--bg-void-2);
    border: 1px solid var(--border-soft);
    color: var(--text-primary);
    border-radius: 10px;
}
.form-control::placeholder{ color: var(--text-faint); }
.form-control:focus, .form-select:focus{
    background: var(--bg-void-2);
    border-color: var(--accent-aurora);
    color: var(--text-primary);
    box-shadow: 0 0 0 .22rem rgba(34,211,238,.25);
}
.form-control[readonly]{ opacity:.6; }
textarea.form-control{ resize: none; }
.form-select option{ background: var(--bg-surface); color: var(--text-primary); }

.input-group-text{
    background: var(--bg-surface-3);
    border: 1px solid var(--border-soft);
    color: var(--accent-aurora);
}

.alert-danger{
    background: rgba(249,122,77,.12);
    border: 1px solid rgba(249,122,77,.4);
    color: #ffd9c4;
    border-radius: 10px;
}

.table{
    color: var(--text-primary);
    border-color: var(--border-soft);
    margin-bottom: 0;
}
.table > :not(caption) > * > *{
    background: transparent;
    border-color: var(--border-soft);
    color: var(--text-primary);
}
.table thead th{
    background: linear-gradient(90deg, var(--accent-violet), var(--accent-earth));
    color: #fff;
    text-align: center;
    font-family: var(--font-display);
    font-weight: 600;
    letter-spacing: .02em;
    border: none;
}
.table-hover > tbody > tr:hover > *{
    background: var(--bg-surface-3);
}
.table-bordered{ border: 1px solid var(--border-soft); }

.badge{
    background: linear-gradient(135deg, var(--accent-earth), var(--accent-nebula)) !important;
    font-family: var(--font-display);
    font-weight: 600;
    letter-spacing: .02em;
    padding: .5em .85em;
    border-radius: 8px;
}

.navbar-app{
    background: linear-gradient(90deg, #0a0e1c, #101830);
    border-bottom: 1px solid var(--border-soft);
    box-shadow: 0 12px 30px -20px rgba(79,140,255,.7);
}
.navbar-app .navbar-brand{
    color: #fff;
    font-weight: 700;
    letter-spacing: -.01em;
}
.navbar-app .navbar-brand i{
    background: linear-gradient(135deg, var(--accent-earth), var(--accent-aurora));
    -webkit-background-clip: text; background-clip: text; color: transparent;
    margin-right: .4rem;
}
.navbar-app .crumb{
    color: var(--text-muted);
    font-size: .92rem;
    text-decoration: none;
}
.navbar-app .crumb:hover{ color: var(--accent-aurora); }
.navbar-app .crumb-sep{ color: var(--text-faint); margin: 0 .35rem; }
.navbar-app .crumb-current{ color: #fff; font-weight: 600; }

.card-menu{
    background: linear-gradient(180deg, var(--bg-surface-2), var(--bg-surface));
    border: 1px solid var(--border-soft);
    border-radius: 20px;
    transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
}
.card-menu:hover{
    transform: translateY(-8px);
    border-color: var(--border-glow);
    box-shadow: 0 28px 55px -22px rgba(79,140,255,.55);
}
.icon{
    width: 78px; height: 78px; margin: 0 auto;
    display: flex; align-items: center; justify-content: center;
    border-radius: 50%; font-size: 32px;
    background: radial-gradient(circle at 35% 30%, var(--bg-surface-3), var(--bg-void-2));
    border: 1px solid var(--border-soft);
    box-shadow: 0 0 30px -10px currentColor;
    position: relative;
}
.icon::after{
    content:"";
    position:absolute;
    width: 108%; height: 34%;
    border: 1px solid currentColor;
    opacity:.35;
    border-radius: 50%;
    transform: rotate(-18deg);
}

.login-page{
    min-height: 100vh;
    display: flex; align-items: center; justify-content: center;
    position: relative; overflow: hidden;
}
.ambient-orb{
    position: absolute;
    border-radius: 50%;
    filter: blur(110px);
    z-index: 0;
    pointer-events: none;
}
.orb-violet{
    background: var(--accent-earth); opacity: .3;
    width: 440px; height: 440px; top: -160px; left: -160px;
}
.orb-fuchsia{
    background: var(--accent-nebula); opacity: .22;
    width: 480px; height: 480px; bottom: -180px; right: -180px;
}
.login-card{
    position: relative; z-index: 1;
    width: 100%; max-width: 420px;
}
.logo-badge{
    width: 84px; height: 84px; margin: 0 auto 1rem;
    display: flex; align-items: center; justify-content: center;
    border-radius: 24px; font-size: 38px; color: #fff;
    background: linear-gradient(135deg, var(--accent-earth), var(--accent-nebula));
    box-shadow: 0 18px 40px -12px rgba(79,140,255,.7);
}

.footer{ color: var(--text-muted); text-align: center; margin-top: 40px; }
hr{ border-color: var(--border-soft); opacity: 1; }
</style>
</head>
<body>

<nav class="navbar navbar-dark navbar-app">
    <div class="container">
        <a class="navbar-brand" href="../index.php">
            <i class="bi bi-mortarboard-fill"></i>Sistem Akademik
        </a>
        <div>
            <a href="../index.php" class="crumb"><i class="bi bi-house-door-fill"></i> Dashboard</a>
            <span class="crumb-sep">/</span>
            <span class="crumb-current">Data Siswa</span>
        </div>
    </div>
</nav>

<div class="container py-5">

    <div class="card">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h2 class="title">
                    <i class="bi bi-people-fill"></i>
                    Data Siswa
                </h2>

                <a href="tambah.php" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Data
                </a>

            </div>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>
                        <tr>
                            <th width="15%">NIS</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th width="18%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM siswa");

                    while ($data = mysqli_fetch_array($query)) {
                    ?>

                    <tr>

                        <td><?php echo $data['nis']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>

                        <td class="text-center">

                            <a href="edit.php?nis=<?php echo $data['nis']; ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <a href="hapus.php?nis=<?php echo $data['nis']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>

                        </td>

                    </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                <a href="../index.php" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Dashboard
                </a>
            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
