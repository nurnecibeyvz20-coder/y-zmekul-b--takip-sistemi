<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-icon"><i class="fas fa-water"></i></div>
    <div>
      <div class="logo-text">AquaClub</div>
      <div class="logo-sub">Yönetim Sistemi</div>
    </div>
  </div>

  <div class="nav-section">
    <div class="nav-label">Ana Menü</div>
    <div class="nav-item active" onclick="navigate('dashboard', this)">
      <i class="fas fa-chart-pie"></i> Gösterge Paneli
    </div>
    <div class="nav-item" onclick="navigate('sporcular', this)">
      <i class="fas fa-swimming-pool"></i> Sporcular
      <span class="nav-badge">42</span>
    </div>
    <div class="nav-item" onclick="navigate('kayit', this)">
      <i class="fas fa-user-plus"></i> Sporcu Kayıt
    </div>
    <div class="nav-item" onclick="navigate('performans', this)">
      <i class="fas fa-chart-line"></i> Performans
    </div>
  </div>

  <div class="nav-section">
    <div class="nav-label">Yönetim</div>
    <div class="nav-item" onclick="navigate('antrenorler', this)">
      <i class="fas fa-user-tie"></i> Antrenörler
    </div>
    <div class="nav-item" onclick="navigate('havuz', this)">
      <i class="fas fa-tint"></i> Havuz Bilgileri
    </div>
    <div class="nav-item" onclick="navigate('takvim', this)">
      <i class="fas fa-calendar-alt"></i> Takvim & Ders
    </div>
    <div class="nav-item" onclick="navigate('muhasebe', this)">
      <i class="fas fa-coins"></i> Muhasebe
      <span class="nav-badge" style="background:var(--warning);color:#fff">3</span>
    </div>
  </div>

  <div class="nav-section">
    <div class="nav-label">Diğer</div>
    <div class="nav-item" onclick="navigate('raporlar', this)">
      <i class="fas fa-file-alt"></i> Raporlar
    </div>
    <div class="nav-item" onclick="navigate('ayarlar', this)">
      <i class="fas fa-cog"></i> Ayarlar
    </div>
  </div>

  <div class="sidebar-footer">
    <div class="user-pill">
      <div class="user-avatar"><?= strtoupper(substr($_SESSION['admin'], 0, 2)) ?></div>
      <div class="user-info">
        <div class="user-name"><?= $_SESSION['admin'] ?></div>
        <div class="user-role"><?= $_SESSION['rol'] ?></div>
      </div>
    </div>
    <a href="actions/logout_action.php" class="btn btn-primary btn-sm">
      Çıkış Yap
    </a>
  </div>
</aside>