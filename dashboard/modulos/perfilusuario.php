<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Módulo Perfil</title>

<?php
    
    include "../../conexion.php";
    $doc = $_SESSION['user'];
    $userdatos = mysqli_query($conexion, "SELECT s_nombre, s_apellido, email, grupo, id_rol FROM usuarios WHERE doc = '$doc'")or die($conexion."Problemas en la consulta");
    $num1 = mysqli_num_rows($userdatos);
    if($num1 > 0){
    while($row1=mysqli_fetch_array($userdatos)){
        $_SESSION['snom'] = $row1['s_nombre'];
        $_SESSION['sape'] = $row1['s_apellido'];
        $_SESSION['grupo'] = $row1['grupo'];
        $_SESSION['email'] = $row1['email'];
        $_SESSION['rolus'] = $row1['id_rol'];
    }
  }
?>

<style>
  :root{
    --azul: #ccc;
    --verde:  #2A9D8F;
    --amarillo: #ccc;
    --rojo: #ccc;
    --negro: #000000;
    --blanco: #ffffff;
    --gris: #3d3d3d;

    --verde-sec: #3A6B7B;
    --negro-sec:#061d1a;
    --verde-ter: #7ecec4;

    --negro-tra: rgba(0,0,0,.6);

    --surface: var(--blanco);
    --surface-alt: color-mix(in srgb, var(--verde-ter) 6%, var(--blanco));
    --text: var(--gris);
    --text-strong: var(--negro);
    --brand: var(--verde);
    --brand-hover: var(--verde-sec, #2a7a70);
    --border: color-mix(in srgb, var(--gris) 12%, transparent);
    --ring: var(--verde-ter);
    --muted: #9aa0a6;
    --shadow: 0 8px 20px -8px var(--negro-tra);
    --radius: 16px;
  }
  * { box-sizing: border-box; }
  body {
    margin: 0; padding: 24px;
    font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif;
    color: var(--text);
    background: var(--surface-alt);
  }

  .profile-card{
    max-width: 760px;
    margin: 0 auto;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    overflow: clip;
  }

  .profile-card__cover{
    height: 140px;
    background:
      radial-gradient(1200px 220px at 10% 0%, color-mix(in srgb, var(--brand) 25%, transparent), transparent 60%),
      linear-gradient(120deg, var(--brand) 0%, var(--verde-ter) 55%, color-mix(in srgb, var(--verde) 20%, var(--azul)) 100%);
    position: relative;
  }

  .profile-card__body{
    display: grid;
    grid-template-columns: 112px 1fr;
    gap: 16px;
    padding: 0 20px 20px;
    position: relative;
  }

  .profile-card__avatar{
    width: 112px; height: 112px;
    border-radius: 50%;
    border: 4px solid var(--surface);
    background: linear-gradient(180deg, #e8e8e8, #cfcfcf);
    position: relative;
    top: -56px;
    box-shadow: 0 6px 24px -10px var(--negro-tra);
    overflow: hidden;
  }

  .profile-card__avatar img{
    width: 100%; height: 100%; display: block; object-fit: cover;
  }

  .profile-card__header{
    align-self: end;
    margin-top: -40px;
  }

  .profile-card__name{
    margin: 0;
    font-size: clamp(1.25rem, 1.2rem + 1vw, 1.75rem);
    color: var(--text-strong);
    line-height: 1.2;
  }

  .profile-card__meta{
    display: flex; flex-wrap: wrap; gap: 8px 14px;
    margin: 8px 0 0;
    font-size: .95rem;
    color: var(--muted);
  }

  .badge{
    display: inline-flex; align-items: center; gap: .5ch;
    padding: 6px 10px;
    border-radius: 999px;
    border: 1px solid var(--border);
    background: color-mix(in srgb, var(--brand) 8%, var(--surface));
    color: var(--text-strong);
    font-weight: 600;
    font-size: .85rem;
  }

  .profile-card__actions{
    margin-left: auto;
    align-self: start;
    display: flex; gap: 10px; flex-wrap: wrap;
  }

  .btn{
    --bg: var(--brand);
    --bg-hover: var(--brand-hover);
    --fg: var(--blanco);
    --ring-w: 0;
    appearance: none;
    border: none;
    border-radius: 12px;
    padding: 10px 14px;
    font-weight: 700;
    cursor: pointer;
    background: var(--bg);
    color: var(--fg);
    transition: transform .06s ease, background .2s ease, box-shadow .2s ease;
    box-shadow: 0 2px 6px -2px var(--negro-tra);
  }
  .btn:hover{ background: var(--bg-hover, var(--negro-sec)); transform: translateY(-1px); }
  .btn:active{ transform: translateY(0); }
  .btn:focus-visible{
    outline: none;
    box-shadow: 0 0 0 3px color-mix(in srgb, var(--ring) 60%, transparent);
  }

  .btn--ghost{
    --bg: color-mix(in srgb, var(--brand) 10%, transparent);
    --bg-hover: color-mix(in srgb, var(--brand) 20%, var(--negro-sec, #0a0a0a));
    --fg: var(--text-strong);
    border: 1px solid var(--border);
  }

  .profile-card__content{
    grid-column: 1 / -1;
    display: grid;
    gap: 16px;
    padding-top: 6px;
  }

  .profile-card__bio{
    font-size: .98rem;
    line-height: 1.5;
    color: var(--text);
  }

  .profile-card__stats{
    display: grid;
    grid-template-columns: repeat(4, minmax(0,1fr));
    gap: 12px;
  }
  .stat{
    padding: 12px;
    border: 1px solid var(--border);
    border-radius: 12px;
    text-align: center;
    background: color-mix(in srgb, var(--brand) 6%, var(--surface));
  }
  .stat__value{
    font-size: 1.15rem; font-weight: 800; color: var(--text-strong);
    display: block;
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .stat__label{
    font-size: .8rem; color: var(--muted);
  }

  .profile-card__links{
    display: flex; gap: 10px; flex-wrap: wrap;
  }
  .icon-btn{
    --bg: var(--surface);
    --bg-hover: color-mix(in srgb, var(--brand) 12%, var(--surface));
    --fg: var(--text-strong);
    display: inline-flex; align-items: center; justify-content: center;
    width: 40px; height: 40px; border-radius: 10px;
    border: 1px solid var(--border);
    background: var(--bg); color: var(--fg);
    transition: background .2s ease, transform .06s ease;
  }
  .icon-btn:hover{ background: var(--bg-hover); transform: translateY(-1px); }
  .icon-btn:focus-visible{
    outline: none; box-shadow: 0 0 0 3px color-mix(in srgb, var(--ring) 60%, transparent);
  }
  .icon{
    width: 20px; height: 20px; fill: currentColor;
  }
  @media (max-width: 640px){
    .profile-card__body{ grid-template-columns: 84px 1fr; }
    .profile-card__avatar{ width: 84px; height: 84px; top: -42px; }
    .profile-card__stats{ grid-template-columns: repeat(2, minmax(0,1fr)); }
    .profile-card__actions{ grid-column: 1 / -1; margin-top: 6px; }
  }
</style>
</head>
<body>

<article class="profile-card" aria-label="Perfil de usuario">
  <div class="profile-card__cover" aria-hidden="true"></div>

  <div class="profile-card__body">
    <figure class="profile-card__avatar" aria-labelledby="avatar-label">
      <figcaption id="avatar-label" class="sr-only"></figcaption>
    </figure>

    <header class="profile-card__header">
      <h1 class="profile-card__name"><?php echo $_SESSION['nom']," "; echo $_SESSION['snom'], " "; echo $_SESSION['ape'], " "; echo $_SESSION['sape']; ?></h1>
      <div class="profile-card__meta">
        <span>Medellín, CO</span>
      </div>
    </header>

    <div class="profile-card__actions">
      <button class="btn" type="button" id="followBtn" aria-pressed="false">Ver reportes</button>
      <button class="btn btn--ghost" type="button">Buzon de sigerencias</button>
    </div>

    <section class="profile-card__content">
        <center>
            <div class="profile-card__stats" aria-label="Estadísticas">
                <div class="stat" role="group" aria-label="Seguidores">
                    <div class="stat__value"><?php echo $_SESSION['email']; ?></div>
                    <div class="stat__label">Email</div>
                </div>
                <div class="stat" role="group" aria-label="Siguiendo">
                    <div class="stat__value"><?php echo $_SESSION['grupo']; ?></div>
                    <div class="stat__label">Grupo</div>
                </div>
                <div class="stat" role="group" aria-label="Proyectos">
                    <div class="stat__value"><?php echo $_SESSION['rolus']; ?></div>
                    <div class="stat__label">Tu Rol</div>
                </div>
            </div>
        </center>
    </section>
  </div>
</article>


</body>
</html>