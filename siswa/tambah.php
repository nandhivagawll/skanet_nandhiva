
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>

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

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card">

                <div class="card-body p-4">

                    <h2 class="text-center mb-4">
                        <i class="bi bi-person-plus-fill"></i>
                        Tambah Data Siswa
                    </h2>

                    <form action="simpan.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label">NIS</label>
                            <input type="text"
                                   name="nis"
                                   class="form-control"
                                   placeholder="Masukkan NIS"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Siswa</label>
                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   placeholder="Masukkan Nama Siswa"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Alamat</label>
                            <textarea
                                name="alamat"
                                class="form-control"
                                rows="3"
                                placeholder="Masukkan Alamat"
                                required></textarea>
                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="index.php" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i>
                                Simpan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
