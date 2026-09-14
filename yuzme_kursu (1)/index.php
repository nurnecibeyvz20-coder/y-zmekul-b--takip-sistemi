<?php include "includes/auth.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>


<!-- MAIN -->
<main class="main">
  <div class="topbar">
    <div class="topbar-title" id="page-title">Gösterge <span>Paneli</span></div>
    <div class="search-bar">
      <i class="fas fa-search"></i>
      <input type="text" placeholder="Sporcu ara..." id="global-search">
    </div>
    <div class="notif-btn"><i class="fas fa-bell"></i><span class="notif-dot"></span></div>
    <button class="btn btn-primary btn-sm" onclick="openModal('kayit-modal')"><i class="fas fa-plus"></i> Yeni Sporcu</button>
  </div>

  <!-- ══════════ DASHBOARD ══════════ -->
  <div class="page active" id="page-dashboard">
    <div class="stats-grid">
      <div class="stat-card" style="--accent:#0A84FF;--icon-bg:#E8F4FF">
        <div class="icon"><i class="fas fa-swimming-pool"></i></div>
        <div class="stat-value">42</div>
        <div class="stat-label">Aktif Sporcu</div>
        <div class="stat-change up"><i class="fas fa-arrow-up"></i> +5 bu ay</div>
      </div>
      <div class="stat-card" style="--accent:#00C9A7;--icon-bg:#E0FBF4">
        <div class="icon"><i class="fas fa-user-tie"></i></div>
        <div class="stat-value">6</div>
        <div class="stat-label">Antrenör</div>
        <div class="stat-change up"><i class="fas fa-arrow-up"></i> +1 bu ay</div>
      </div>
      <div class="stat-card" style="--accent:#F59E0B;--icon-bg:#FFF4E0">
        <div class="icon"><i class="fas fa-coins"></i></div>
        <div class="stat-value">₺48.2K</div>
        <div class="stat-label">Aylık Gelir</div>
        <div class="stat-change up"><i class="fas fa-arrow-up"></i> +12%</div>
      </div>
      <div class="stat-card" style="--accent:#EF4444;--icon-bg:#FEE8E8">
        <div class="icon"><i class="fas fa-calendar-times"></i></div>
        <div class="stat-value">7</div>
        <div class="stat-label">Gecikmiş Ödeme</div>
        <div class="stat-change down"><i class="fas fa-arrow-down"></i> -2 bu ay</div>
      </div>
    </div>

    <div class="grid-2">
      <!-- Son kayıtlar -->
      <div class="card">
        <div class="card-head">
          <span class="card-title">Son Kayıtlar</span>
          <button class="btn btn-secondary btn-sm" onclick="navigate('sporcular', document.querySelector('.nav-item:nth-child(2)'))">Tümü</button>
        </div>
        <div class="table-wrap">
          <table>
            <thead><tr><th>Sporcu</th><th>Grup</th><th>Tarih</th><th>Durum</th></tr></thead>
            <tbody>
              <?php
                include "config/db.php";
                $sql = "SELECT * FROM sporcular";
                $stmt = $pdo->query($sql);
                $sporcular = $stmt->fetchAll();
              ?>
              <?php foreach($sporcular as $sporcu): ?>
                <tr><td><b><?= $sporcu['ad'] .' '. $sporcu['soyad'] ?></b></td><td>Başlangıç A</td><td><?= date('d/m/Y', strtotime($sporcu['kayit_tarihi'])) ?></td><td><span class="badge badge-green">Aktif</span></td></tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Havuz Durumu -->
      <div class="card">
        <div class="card-head"><span class="card-title">Havuz Şeritleri — Anlık</span><span class="badge badge-green"><i class="fas fa-circle" style="font-size:8px"></i> Canlı</span></div>
        <div class="card-body">
          <div class="pool-visual">
            <div class="pool-lane"><div class="lane-num">1</div><div class="lane-name">Başlangıç A</div><div class="lane-count">8/10</div><div class="lane-status ok"></div></div>
            <div class="pool-lane"><div class="lane-num">2</div><div class="lane-name">Başlangıç B</div><div class="lane-count">6/10</div><div class="lane-status ok"></div></div>
            <div class="pool-lane"><div class="lane-num">3</div><div class="lane-name">Orta Seviye</div><div class="lane-count">10/10</div><div class="lane-status full"></div></div>
            <div class="pool-lane"><div class="lane-num">4</div><div class="lane-name">İleri Seviye</div><div class="lane-count">7/10</div><div class="lane-status ok"></div></div>
            <div class="pool-lane"><div class="lane-num">5</div><div class="lane-name">Yarışma</div><div class="lane-count">4/6</div><div class="lane-status ok"></div></div>
            <div class="pool-lane"><div class="lane-num">6</div><div class="lane-name">Serbest Yüzüş</div><div class="lane-count">0/8</div><div class="lane-status closed"></div></div>
          </div>
        </div>
      </div>
    </div>

    <div class="grid-2">
      <!-- Bugünkü dersler -->
      <div class="card">
        <div class="card-head"><span class="card-title">Bugünkü Program</span><span style="font-size:12px;color:var(--text2)">19 Mayıs 2025</span></div>
        <div class="table-wrap">
          <table>
            <thead><tr><th>Saat</th><th>Grup</th><th>Antrenör</th><th>Şerit</th></tr></thead>
            <tbody>
              <tr><td>08:00</td><td>Başlangıç A</td><td>Ahmet H.</td><td>1</td></tr>
              <tr><td>10:00</td><td>Orta Seviye</td><td>Sevda K.</td><td>3</td></tr>
              <tr><td>14:00</td><td>Yarışma Grubu</td><td>Murat B.</td><td>5</td></tr>
              <tr><td>16:30</td><td>İleri Seviye</td><td>Ahmet H.</td><td>4</td></tr>
              <tr><td>18:00</td><td>Başlangıç B</td><td>Elif T.</td><td>2</td></tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Ödeme durumu -->
      <div class="card">
        <div class="card-head"><span class="card-title">Ödeme Durumu (Mayıs)</span></div>
        <div class="card-body">
          <div style="margin-bottom:16px">
            <div style="display:flex;justify-content:space-between;font-size:13px;margin-bottom:6px"><span>Tahsil Edildi</span><span style="font-weight:600;color:var(--teal)">₺38.400</span></div>
            <div style="background:var(--surface);border-radius:99px;height:10px;overflow:hidden"><div style="width:80%;height:100%;background:var(--teal);border-radius:99px"></div></div>
          </div>
          <div style="margin-bottom:16px">
            <div style="display:flex;justify-content:space-between;font-size:13px;margin-bottom:6px"><span>Bekleyen</span><span style="font-weight:600;color:var(--warning)">₺7.200</span></div>
            <div style="background:var(--surface);border-radius:99px;height:10px;overflow:hidden"><div style="width:15%;height:100%;background:var(--warning);border-radius:99px"></div></div>
          </div>
          <div>
            <div style="display:flex;justify-content:space-between;font-size:13px;margin-bottom:6px"><span>Gecikmiş</span><span style="font-weight:600;color:var(--danger)">₺2.600</span></div>
            <div style="background:var(--surface);border-radius:99px;height:10px;overflow:hidden"><div style="width:5%;height:100%;background:var(--danger);border-radius:99px"></div></div>
          </div>
          <div style="margin-top:20px;padding-top:16px;border-top:1px solid var(--border);display:flex;justify-content:space-between;align-items:center">
            <span style="font-size:13px;color:var(--text2)">Hedef</span>
            <span style="font-family:'Syne',sans-serif;font-size:20px;font-weight:700">₺48.200 <span style="font-size:13px;font-weight:400;color:var(--text3)">/ ₺52.000</span></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ══════════ SPORCULAR ══════════ -->
  <div class="page" id="page-sporcular">
    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px">
      <div style="display:flex;gap:8px">
        <select id="filter-group" style="font-size:13px;padding:8px 12px">
          <option value="">Tüm Gruplar</option>
          <option>Başlangıç A</option>
          <option>Başlangıç B</option>
          <option>Orta Seviye</option>
          <option>İleri Seviye</option>
          <option>Yarışma</option>
        </select>
        <select id="filter-status" style="font-size:13px;padding:8px 12px">
          <option value="">Tüm Durumlar</option>
          <option>Aktif</option>
          <option>Pasif</option>
          <option>Beklemede</option>
        </select>
      </div>
      <button class="btn btn-primary" onclick="openModal('kayit-modal')"><i class="fas fa-plus"></i> Yeni Sporcu</button>
    </div>

    <div class="swimmer-grid" id="swimmer-grid">
      <!-- JS will render -->
    </div>
  </div>

  <!-- ══════════ KAYIT ══════════ -->
  <div class="page" id="page-kayit">
    <div class="card" style="max-width:720px">
      <div class="card-head">
        <span class="card-title"><i class="fas fa-user-plus" style="color:var(--blue);margin-right:8px"></i>Yeni Sporcu Kaydı</span>
      </div>
      <div class="card-body">
        <h4 style="font-size:12px;letter-spacing:.8px;text-transform:uppercase;color:var(--text3);margin-bottom:14px">Kişisel Bilgiler</h4>
        <div class="form-grid">
          <div class="form-group"><label>Ad</label><input type="text" placeholder="Ad" id="reg-ad"></div>
          <div class="form-group"><label>Soyad</label><input type="text" placeholder="Soyad" id="reg-soyad"></div>
          <div class="form-group"><label>Doğum Tarihi</label><input type="date" id="reg-dogum"></div>
          <div class="form-group"><label>Cinsiyet</label><select id="reg-cinsiyet"><option>Erkek</option><option>Kadın</option></select></div>
          <div class="form-group"><label>TC Kimlik No</label><input type="text" placeholder="11 haneli TC" id="reg-tc"></div>
          <div class="form-group"><label>Telefon</label><input type="text" placeholder="05XX..." id="reg-tel"></div>
          <div class="form-group full"><label>E-posta</label><input type="email" placeholder="ornek@mail.com" id="reg-email"></div>
          <div class="form-group full"><label>Adres</label><textarea placeholder="Ev adresi..." id="reg-adres"></textarea></div>
        </div>

        <h4 style="font-size:12px;letter-spacing:.8px;text-transform:uppercase;color:var(--text3);margin:20px 0 14px">Veli Bilgileri</h4>
        <div class="form-grid">
          <div class="form-group"><label>Veli Adı Soyadı</label><input type="text" placeholder="Veli adı" id="reg-veli"></div>
          <div class="form-group"><label>Veli Telefon</label><input type="text" placeholder="05XX..." id="reg-velitel"></div>
          <div class="form-group"><label>Yakınlık</label><select id="reg-yakinlik"><option>Anne</option><option>Baba</option><option>Diğer</option></select></div>
          <div class="form-group"><label>Veli E-posta</label><input type="email" placeholder="veli@mail.com" id="reg-velimail"></div>
        </div>

        <h4 style="font-size:12px;letter-spacing:.8px;text-transform:uppercase;color:var(--text3);margin:20px 0 14px">Yüzme Bilgileri</h4>
        <div class="form-grid form-grid-3">
          <div class="form-group"><label>Grup / Seviye</label>
            <select id="reg-grup">
              <option>Başlangıç A</option>
              <option>Başlangıç B</option>
              <option>Orta Seviye</option>
              <option>İleri Seviye</option>
              <option>Yarışma</option>
            </select>
          </div>
          <div class="form-group"><label>Antrenör</label>
            <select id="reg-antrenor">
              <option>Ahmet Hoca</option>
              <option>Sevda Hoca</option>
              <option>Murat Hoca</option>
              <option>Elif Hoca</option>
            </select>
          </div>
          <div class="form-group"><label>Başlangıç Tarihi</label><input type="date" id="reg-bastar"></div>
          <div class="form-group"><label>Yüzme Deneyimi</label>
            <select id="reg-deneyim">
              <option>Hiç yok</option>
              <option>1-3 ay</option>
              <option>3-6 ay</option>
              <option>6 ay - 1 yıl</option>
              <option>1 yıl+</option>
            </select>
          </div>
          <div class="form-group"><label>Ders Günleri</label>
            <select id="reg-gun">
              <option>Pzt - Çrş - Cum</option>
              <option>Salı - Perşembe</option>
              <option>Hafta Sonu</option>
              <option>Her Gün</option>
            </select>
          </div>
          <div class="form-group"><label>Ders Saati</label>
            <select id="reg-saat">
              <option>08:00</option>
              <option>10:00</option>
              <option>14:00</option>
              <option>16:30</option>
              <option>18:00</option>
            </select>
          </div>
        </div>

        <h4 style="font-size:12px;letter-spacing:.8px;text-transform:uppercase;color:var(--text3);margin:20px 0 14px">Sağlık Bilgileri</h4>
        <div class="form-grid">
          <div class="form-group"><label>Kan Grubu</label>
            <select id="reg-kan"><option>A+</option><option>A-</option><option>B+</option><option>B-</option><option>AB+</option><option>AB-</option><option>0+</option><option>0-</option></select>
          </div>
          <div class="form-group"><label>Sağlık Sigortası</label><input type="text" placeholder="Sigorta şirketi" id="reg-sigorta"></div>
          <div class="form-group full"><label>Sağlık Notu / Alerjiler</label><textarea placeholder="Varsa sağlık sorunları, alerjiler..." id="reg-saglik"></textarea></div>
        </div>

        <h4 style="font-size:12px;letter-spacing:.8px;text-transform:uppercase;color:var(--text3);margin:20px 0 14px">Ödeme Bilgileri</h4>
        <div class="form-grid">
          <div class="form-group"><label>Aylık Ücret</label><input type="number" placeholder="₺" id="reg-ucret" value="1200"></div>
          <div class="form-group"><label>Ödeme Günü</label><select id="reg-odeme-gun"><option>1</option><option>5</option><option>10</option><option>15</option><option>20</option></select></div>
          <div class="form-group"><label>Ödeme Yöntemi</label>
            <select id="reg-odeme-yon">
              <option>Nakit</option>
              <option>Kredi Kartı</option>
              <option>Banka Transferi</option>
              <option>EFT</option>
            </select>
          </div>
          <div class="form-group"><label>İndirim (%)</label><input type="number" placeholder="0" id="reg-indirim" value="0"></div>
        </div>

        <div style="display:flex;gap:12px;margin-top:24px;justify-content:flex-end">
          <button class="btn btn-secondary" onclick="clearForm()"><i class="fas fa-times"></i> Temizle</button>
          <button class="btn btn-primary" onclick="saveSwimmer()"><i class="fas fa-save"></i> Kaydet</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ══════════ PERFORMANS ══════════ -->
  <div class="page" id="page-performans">
    <div style="display:flex;gap:12px;align-items:center">
      <select id="perf-sporcu" style="font-size:13px;padding:8px 12px;min-width:200px">
        <option>Elif Kaya</option>
        <option>Mert Demir</option>
        <option>Zeynep Arslan</option>
        <option>Ali Öztürk</option>
        <option>Selin Yıldız</option>
      </select>
      <select id="perf-sure" style="font-size:13px;padding:8px 12px">
        <option>Son 3 Ay</option>
        <option>Son 6 Ay</option>
        <option>Bu Yıl</option>
      </select>
    </div>

    <div class="grid-2">
      <div class="card">
        <div class="card-head"><span class="card-title">Teknik Değerlendirme</span></div>
        <div class="card-body">
          <div id="perf-bars">
            <!-- rendered by JS -->
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-head"><span class="card-title">En İyi Dereceler (Havuz 25m)</span></div>
        <div class="table-wrap">
          <table>
            <thead><tr><th>Mesafe / Stil</th><th>Derece</th><th>Tarih</th><th>Trend</th></tr></thead>
            <tbody>
              <tr><td>50m Serbest</td><td><b>34.21s</b></td><td>Nis 25</td><td><span style="color:var(--teal)">▼ -0.8s</span></td></tr>
              <tr><td>100m Serbest</td><td><b>1:14.5</b></td><td>Mar 25</td><td><span style="color:var(--teal)">▼ -2.1s</span></td></tr>
              <tr><td>50m Kurbağalama</td><td><b>41.8s</b></td><td>May 25</td><td><span style="color:var(--teal)">▼ -1.2s</span></td></tr>
              <tr><td>50m Sırtüstü</td><td><b>39.5s</b></td><td>Şub 25</td><td><span style="color:var(--danger)">▲ +0.3s</span></td></tr>
              <tr><td>100m Kelebek</td><td><b>1:28.0</b></td><td>May 25</td><td><span style="color:var(--teal)">▼ -3.0s</span></td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-head">
        <span class="card-title">Devam ve Katılım</span>
        <button class="btn btn-secondary btn-sm" onclick="openModal('perf-modal')"><i class="fas fa-plus"></i> Değerlendirme Ekle</button>
      </div>
      <div class="card-body">
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(44px,1fr));gap:6px" id="attendance-grid">
        </div>
        <div style="display:flex;gap:16px;margin-top:12px;font-size:12px;color:var(--text2)">
          <span style="display:flex;align-items:center;gap:5px"><span style="width:12px;height:12px;border-radius:3px;background:var(--teal);display:inline-block"></span>Katıldı</span>
          <span style="display:flex;align-items:center;gap:5px"><span style="width:12px;height:12px;border-radius:3px;background:var(--danger);display:inline-block"></span>Katılmadı</span>
          <span style="display:flex;align-items:center;gap:5px"><span style="width:12px;height:12px;border-radius:3px;background:var(--warning);display:inline-block"></span>Mazeretli</span>
        </div>
      </div>
    </div>
  </div>

  <!-- ══════════ ANTRENÖRLER ══════════ -->
  <div class="page" id="page-antrenorler">
    <div style="display:flex;justify-content:flex-end">
      <button class="btn btn-primary" onclick="openModal('antrenor-modal')"><i class="fas fa-plus"></i> Antrenör Ekle</button>
    </div>
    <div class="grid-2" id="antrenor-grid">
    </div>
  </div>

  <!-- ══════════ HAVUZ ══════════ -->
  <div class="page" id="page-havuz">
    <div class="grid-2">
      <div class="card">
        <div class="card-head"><span class="card-title">Havuz Teknik Bilgileri</span></div>
        <div class="card-body">
          <table style="font-size:13.5px">
            <tr><td style="padding:8px 0;color:var(--text2);width:180px">Havuz Boyutu</td><td style="font-weight:600">25m × 15m</td></tr>
            <tr><td style="padding:8px 0;color:var(--text2)">Şerit Sayısı</td><td style="font-weight:600">6 Şerit</td></tr>
            <tr><td style="padding:8px 0;color:var(--text2)">Su Hacmi</td><td style="font-weight:600">875 m³</td></tr>
            <tr><td style="padding:8px 0;color:var(--text2)">Su Sıcaklığı</td><td style="font-weight:600">28°C <span class="badge badge-green" style="margin-left:6px">Normal</span></td></tr>
            <tr><td style="padding:8px 0;color:var(--text2)">pH Değeri</td><td style="font-weight:600">7.4 <span class="badge badge-green" style="margin-left:6px">İdeal</span></td></tr>
            <tr><td style="padding:8px 0;color:var(--text2)">Klor Miktarı</td><td style="font-weight:600">1.2 mg/L <span class="badge badge-green" style="margin-left:6px">Normal</span></td></tr>
            <tr><td style="padding:8px 0;color:var(--text2)">Maksimum Kapasite</td><td style="font-weight:600">60 kişi</td></tr>
            <tr><td style="padding:8px 0;color:var(--text2)">Son Temizlik</td><td style="font-weight:600">17 Mayıs 2025</td></tr>
            <tr><td style="padding:8px 0;color:var(--text2)">Filtre Bakımı</td><td style="font-weight:600;color:var(--warning)">25 Mayıs 2025 <span class="badge badge-orange" style="margin-left:6px">Yaklaşıyor</span></td></tr>
          </table>
        </div>
      </div>

      <div class="card">
        <div class="card-head"><span class="card-title">Anlık Su Kalitesi</span></div>
        <div class="card-body">
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
            <div style="background:var(--blue-light);border-radius:var(--radius-sm);padding:16px;text-align:center">
              <div style="font-size:28px;font-family:'Syne',sans-serif;font-weight:700;color:var(--blue)">28°C</div>
              <div style="font-size:12px;color:var(--text2);margin-top:4px">Su Sıcaklığı</div>
            </div>
            <div style="background:#E0FBF4;border-radius:var(--radius-sm);padding:16px;text-align:center">
              <div style="font-size:28px;font-family:'Syne',sans-serif;font-weight:700;color:var(--teal)">7.4</div>
              <div style="font-size:12px;color:var(--text2);margin-top:4px">pH Değeri</div>
            </div>
            <div style="background:#FFF4E0;border-radius:var(--radius-sm);padding:16px;text-align:center">
              <div style="font-size:28px;font-family:'Syne',sans-serif;font-weight:700;color:var(--warning)">1.2</div>
              <div style="font-size:12px;color:var(--text2);margin-top:4px">Klor (mg/L)</div>
            </div>
            <div style="background:#F0EEFF;border-radius:var(--radius-sm);padding:16px;text-align:center">
              <div style="font-size:28px;font-family:'Syne',sans-serif;font-weight:700;color:#5B38D0">45</div>
              <div style="font-size:12px;color:var(--text2);margin-top:4px">Şu An Kişi</div>
            </div>
          </div>
          <button class="btn btn-secondary" style="width:100%;margin-top:16px;justify-content:center" onclick="openModal('havuz-modal')"><i class="fas fa-edit"></i> Değerleri Güncelle</button>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-head"><span class="card-title">Bakım Takvimi</span><button class="btn btn-primary btn-sm" onclick="openModal('bakim-modal')"><i class="fas fa-plus"></i> Bakım Ekle</button></div>
      <div class="table-wrap">
        <table>
          <thead><tr><th>Bakım Türü</th><th>Sorumlu</th><th>Son Tarih</th><th>Sonraki</th><th>Durum</th></tr></thead>
          <tbody>
            <tr><td>Filtre Temizliği</td><td>Teknik Ekip</td><td>17 May</td><td>25 May</td><td><span class="badge badge-orange">Yaklaşıyor</span></td></tr>
            <tr><td>Su Analizi</td><td>Lab.</td><td>19 May</td><td>26 May</td><td><span class="badge badge-green">Tamam</span></td></tr>
            <tr><td>Şerit Halatı</td><td>Teslimat</td><td>15 May</td><td>15 Haz</td><td><span class="badge badge-green">Tamam</span></td></tr>
            <tr><td>Klor Dolumu</td><td>Teknik</td><td>10 May</td><td>24 May</td><td><span class="badge badge-orange">Yaklaşıyor</span></td></tr>
            <tr><td>Aydınlatma</td><td>Elektrik</td><td>1 Nis</td><td>1 Ağu</td><td><span class="badge badge-green">Tamam</span></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ══════════ TAKVİM ══════════ -->
  <div class="page" id="page-takvim">
    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px">
      <div style="display:flex;gap:8px;align-items:center">
        <button class="btn btn-secondary btn-sm"><i class="fas fa-chevron-left"></i></button>
        <span style="font-family:'Syne',sans-serif;font-weight:700;font-size:16px">Mayıs 2025</span>
        <button class="btn btn-secondary btn-sm"><i class="fas fa-chevron-right"></i></button>
      </div>
      <button class="btn btn-primary" onclick="openModal('ders-modal')"><i class="fas fa-plus"></i> Ders Ekle</button>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="schedule-grid" style="margin-bottom:8px">
          <div class="sched-head">Pzt</div><div class="sched-head">Sal</div><div class="sched-head">Çar</div>
          <div class="sched-head">Per</div><div class="sched-head">Cum</div><div class="sched-head">Cmt</div><div class="sched-head">Paz</div>
        </div>
        <div class="schedule-grid" id="cal-grid"></div>
      </div>
    </div>
  </div>

  <!-- ══════════ MUHASEBE ══════════ -->
  <div class="page" id="page-muhasebe">
    <div class="stats-grid">
      <div class="stat-card" style="--accent:#00C9A7;--icon-bg:#E0FBF4">
        <div class="icon"><i class="fas fa-arrow-down"></i></div>
        <div class="stat-value">₺48.2K</div>
        <div class="stat-label">Toplam Gelir (May)</div>
        <div class="stat-change up"><i class="fas fa-arrow-up"></i> +12%</div>
      </div>
      <div class="stat-card" style="--accent:#EF4444;--icon-bg:#FEE8E8">
        <div class="icon"><i class="fas fa-arrow-up"></i></div>
        <div class="stat-value">₺18.4K</div>
        <div class="stat-label">Toplam Gider (May)</div>
        <div class="stat-change down"><i class="fas fa-arrow-down"></i> -3%</div>
      </div>
      <div class="stat-card" style="--accent:#0A84FF;--icon-bg:#E8F4FF">
        <div class="icon"><i class="fas fa-piggy-bank"></i></div>
        <div class="stat-value">₺29.8K</div>
        <div class="stat-label">Net Kar (May)</div>
        <div class="stat-change up"><i class="fas fa-arrow-up"></i> +22%</div>
      </div>
      <div class="stat-card" style="--accent:#F59E0B;--icon-bg:#FFF4E0">
        <div class="icon"><i class="fas fa-exclamation-circle"></i></div>
        <div class="stat-value">₺9.8K</div>
        <div class="stat-label">Tahsil Edilmeyen</div>
        <div class="stat-change down"><i class="fas fa-arrow-down"></i> -5%</div>
      </div>
    </div>

    <div class="grid-2">
      <div class="card">
        <div class="card-head"><span class="card-title">Gelir Kaynakları</span></div>
        <div class="card-body">
          <div class="perf-bar-row"><div class="perf-label">Ders Ücretleri</div><div class="perf-bar-bg"><div class="perf-bar" style="width:75%;background:var(--blue)"></div></div><div class="perf-val">₺36.2K</div></div>
          <div class="perf-bar-row"><div class="perf-label">Özel Dersler</div><div class="perf-bar-bg"><div class="perf-bar" style="width:18%;background:var(--teal)"></div></div><div class="perf-val">₺8.6K</div></div>
          <div class="perf-bar-row"><div class="perf-label">Turnuva Katılım</div><div class="perf-bar-bg"><div class="perf-bar" style="width:7%;background:var(--warning)"></div></div><div class="perf-val">₺3.4K</div></div>
        </div>
      </div>

      <div class="card">
        <div class="card-head"><span class="card-title">Gider Kalemleri</span></div>
        <div class="card-body">
          <div class="perf-bar-row"><div class="perf-label">Antrenör Maaşları</div><div class="perf-bar-bg"><div class="perf-bar" style="width:65%;background:var(--danger)"></div></div><div class="perf-val">₺12K</div></div>
          <div class="perf-bar-row"><div class="perf-label">Havuz İşletme</div><div class="perf-bar-bg"><div class="perf-bar" style="width:22%;background:#F59E0B"></div></div><div class="perf-val">₺4.1K</div></div>
          <div class="perf-bar-row"><div class="perf-label">Ekipman</div><div class="perf-bar-bg"><div class="perf-bar" style="width:8%;background:var(--text3)"></div></div><div class="perf-val">₺1.5K</div></div>
          <div class="perf-bar-row"><div class="perf-label">Diğer</div><div class="perf-bar-bg"><div class="perf-bar" style="width:4%;background:#aaa"></div></div><div class="perf-val">₺0.8K</div></div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-head">
        <span class="card-title">Sporcu Ödemeleri</span>
        <button class="btn btn-primary btn-sm" onclick="openModal('odeme-modal')"><i class="fas fa-plus"></i> Ödeme Ekle</button>
      </div>
      <div class="table-wrap">
        <table>
          <thead><tr><th>Sporcu</th><th>Grup</th><th>Aylık Ücret</th><th>Son Ödeme</th><th>Tutar</th><th>Durum</th><th>İşlem</th></tr></thead>
          <tbody>
            <tr><td><b>Elif Kaya</b></td><td>Başlangıç A</td><td>₺1.200</td><td>1 May</td><td>₺1.200</td><td><span class="badge badge-green">Ödendi</span></td><td><button class="btn btn-secondary btn-sm btn-icon"><i class="fas fa-receipt"></i></button></td></tr>
            <tr><td><b>Mert Demir</b></td><td>Orta Seviye</td><td>₺1.500</td><td>5 May</td><td>₺1.500</td><td><span class="badge badge-green">Ödendi</span></td><td><button class="btn btn-secondary btn-sm btn-icon"><i class="fas fa-receipt"></i></button></td></tr>
            <tr><td><b>Zeynep Arslan</b></td><td>Yarışma</td><td>₺2.000</td><td>—</td><td>₺2.000</td><td><span class="badge badge-red">Gecikmiş</span></td><td><button class="btn btn-primary btn-sm btn-icon"><i class="fas fa-money-bill"></i></button></td></tr>
            <tr><td><b>Ali Öztürk</b></td><td>Başlangıç B</td><td>₺1.200</td><td>—</td><td>₺1.200</td><td><span class="badge badge-orange">Bekliyor</span></td><td><button class="btn btn-primary btn-sm btn-icon"><i class="fas fa-money-bill"></i></button></td></tr>
            <tr><td><b>Selin Yıldız</b></td><td>İleri Seviye</td><td>₺1.800</td><td>3 May</td><td>₺1.800</td><td><span class="badge badge-green">Ödendi</span></td><td><button class="btn btn-secondary btn-sm btn-icon"><i class="fas fa-receipt"></i></button></td></tr>
            <tr><td><b>Burak Şahin</b></td><td>Yarışma</td><td>₺2.000</td><td>—</td><td>₺2.000</td><td><span class="badge badge-red">Gecikmiş</span></td><td><button class="btn btn-primary btn-sm btn-icon"><i class="fas fa-money-bill"></i></button></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ══════════ RAPORLAR ══════════ -->
  <div class="page" id="page-raporlar">
    <div class="grid-3">
      <div class="card" style="cursor:pointer;transition:transform .2s" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform=''">
        <div class="card-body" style="text-align:center;padding:28px">
          <div style="width:56px;height:56px;background:var(--blue-light);border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;font-size:22px;color:var(--blue)"><i class="fas fa-file-pdf"></i></div>
          <div style="font-weight:700;font-size:14px;margin-bottom:6px">Aylık Performans</div>
          <div style="font-size:12px;color:var(--text2)">Tüm sporcuların aylık performans analizi</div>
          <button class="btn btn-primary" style="margin-top:14px;width:100%;justify-content:center"><i class="fas fa-download"></i> PDF İndir</button>
        </div>
      </div>
      <div class="card" style="cursor:pointer;transition:transform .2s" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform=''">
        <div class="card-body" style="text-align:center;padding:28px">
          <div style="width:56px;height:56px;background:#E0FBF4;border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;font-size:22px;color:var(--teal)"><i class="fas fa-file-excel"></i></div>
          <div style="font-weight:700;font-size:14px;margin-bottom:6px">Muhasebe Raporu</div>
          <div style="font-size:12px;color:var(--text2)">Gelir, gider ve bakiye dökümü</div>
          <button class="btn btn-success" style="margin-top:14px;width:100%;justify-content:center"><i class="fas fa-download"></i> Excel İndir</button>
        </div>
      </div>
      <div class="card" style="cursor:pointer;transition:transform .2s" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform=''">
        <div class="card-body" style="text-align:center;padding:28px">
          <div style="width:56px;height:56px;background:#FFF4E0;border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;font-size:22px;color:var(--warning)"><i class="fas fa-users"></i></div>
          <div style="font-weight:700;font-size:14px;margin-bottom:6px">Sporcu Listesi</div>
          <div style="font-size:12px;color:var(--text2)">Tüm aktif sporcuların detaylı listesi</div>
          <button class="btn btn-secondary" style="margin-top:14px;width:100%;justify-content:center"><i class="fas fa-download"></i> Excel İndir</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ══════════ AYARLAR ══════════ -->
  <div class="page" id="page-ayarlar">
    <div class="grid-2" style="max-width:900px">
      <div class="card">
        <div class="card-head"><span class="card-title">Kulüp Bilgileri</span></div>
        <div class="card-body">
          <div class="form-group" style="margin-bottom:12px"><label>Kulüp Adı</label><input value="AquaClub Yüzme Kulübü"></div>
          <div class="form-group" style="margin-bottom:12px"><label>Adres</label><input value="Konya, Türkiye"></div>
          <div class="form-group" style="margin-bottom:12px"><label>Telefon</label><input value="+90 332 000 0000"></div>
          <div class="form-group" style="margin-bottom:16px"><label>E-posta</label><input value="info@aquaclub.com.tr"></div>
          <button class="btn btn-primary" onclick="showToast('Ayarlar kaydedildi!')"><i class="fas fa-save"></i> Kaydet</button>
        </div>
      </div>
      <div class="card">
        <div class="card-head"><span class="card-title">Ücret Tarifeleri</span></div>
        <div class="card-body">
          <div class="form-group" style="margin-bottom:12px"><label>Başlangıç Grubu (₺/ay)</label><input type="number" value="1200"></div>
          <div class="form-group" style="margin-bottom:12px"><label>Orta Seviye (₺/ay)</label><input type="number" value="1500"></div>
          <div class="form-group" style="margin-bottom:12px"><label>İleri Seviye (₺/ay)</label><input type="number" value="1800"></div>
          <div class="form-group" style="margin-bottom:16px"><label>Yarışma Grubu (₺/ay)</label><input type="number" value="2000"></div>
          <button class="btn btn-primary" onclick="showToast('Tarife güncellendi!')"><i class="fas fa-save"></i> Güncelle</button>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- ══════ MODALS ══════ -->
<!-- Kayıt Modal (hızlı) -->
<div class="modal-backdrop" id="kayit-modal">
  <div class="modal">
    <form action="actions/sporcu/sporcu_ekle.php" method="POST">
      <div class="modal-head"><span class="modal-title">Hızlı Sporcu Kaydı</span><button class="close-btn" onclick="closeModal('kayit-modal')"><i class="fas fa-times"></i></button></div>
      <div class="modal-body">
        <div class="form-grid">
          <div class="form-group">
            <label>Ad</label>
            <input type="text" placeholder="Ad" name="ad">
          </div>
          <div class="form-group">
            <label>Soyad</label>
            <input type="text" placeholder="Soyad" name="soyad">
          </div>
          <div class="form-group">
            <label>Doğum Tarihi</label>
            <input type="date" name="tarih"></div>
          <div class="form-group">
            <label>Telefon</label>
            <input type="text" placeholder="05XX..." name="telefon">
          </div>
          <div class="form-group">
            <label>Grup</label>
            <select name="takim">
              <!-- bu alanda value alanlarına takımlar tablosundaki verilerin id değeri yazdırılacak -->
              <option value="0">Başlangıç A</option>
              <option value="1">Başlangıç B</option>
              <option value="2">Orta Seviye</option>
              <option value="3">İleri Seviye</option>
              <option value="4">Yarışma</option>
            </select>
          </div>
          <div class="form-group">
            <label>Aylık Ücret</label>
            <input type="number" value="1200" name="ucret"></div>
        </div>
      </div>
      <div class="modal-foot">
        <button class="btn btn-secondary" onclick="closeModal('kayit-modal')">İptal</button>
        <!-- <button class="btn btn-primary" onclick="closeModal('kayit-modal');showToast('Sporcu kaydedildi!')"><i class="fas fa-save"></i> Kaydet</button> -->
        <button type="submit" class="btn btn-primary" ><i class="fas fa-save"></i> Kaydet</button>
      </div>
    </form>
  </div>
</div>

<!-- Performans Modal -->
<div class="modal-backdrop" id="perf-modal">
  <div class="modal">
    <div class="modal-head"><span class="modal-title">Değerlendirme Ekle</span><button class="close-btn" onclick="closeModal('perf-modal')"><i class="fas fa-times"></i></button></div>
    <div class="modal-body">
      <div class="form-grid">
        <div class="form-group"><label>Tarih</label><input type="date"></div>
        <div class="form-group"><label>Stil</label><select><option>Serbest</option><option>Kurbağalama</option><option>Kelebek</option><option>Sırtüstü</option></select></div>
        <div class="form-group"><label>Mesafe</label><select><option>25m</option><option>50m</option><option>100m</option><option>200m</option></select></div>
        <div class="form-group"><label>Derece (sn)</label><input type="number" placeholder="34.5"></div>
        <div class="form-group full"><label>Antrenör Notu</label><textarea placeholder="Gözlem ve öneriler..."></textarea></div>
      </div>
    </div>
    <div class="modal-foot">
      <button class="btn btn-secondary" onclick="closeModal('perf-modal')">İptal</button>
      <button class="btn btn-primary" onclick="closeModal('perf-modal');showToast('Değerlendirme kaydedildi!')"><i class="fas fa-save"></i> Kaydet</button>
    </div>
  </div>
</div>

<!-- Antrenör Modal -->
<div class="modal-backdrop" id="antrenor-modal">
  <div class="modal">
    <div class="modal-head"><span class="modal-title">Antrenör Ekle</span><button class="close-btn" onclick="closeModal('antrenor-modal')"><i class="fas fa-times"></i></button></div>
    <div class="modal-body">
      <div class="form-grid">
        <div class="form-group"><label>Ad Soyad</label><input type="text" placeholder="Ad Soyad"></div>
        <div class="form-group"><label>Unvan</label><input type="text" placeholder="Baş Antrenör..."></div>
        <div class="form-group"><label>Telefon</label><input type="text"></div>
        <div class="form-group"><label>E-posta</label><input type="email"></div>
        <div class="form-group"><label>Sertifika</label><select><option>FINA Level 1</option><option>FINA Level 2</option><option>FINA Level 3</option><option>Milli Eğitim</option></select></div>
        <div class="form-group"><label>Aylık Maaş</label><input type="number" placeholder="₺"></div>
        <div class="form-group full"><label>Uzmanlık Alanları</label><input type="text" placeholder="Serbest, Kurbağalama..."></div>
      </div>
    </div>
    <div class="modal-foot">
      <button class="btn btn-secondary" onclick="closeModal('antrenor-modal')">İptal</button>
      <button class="btn btn-primary" onclick="closeModal('antrenor-modal');showToast('Antrenör eklendi!')"><i class="fas fa-save"></i> Kaydet</button>
    </div>
  </div>
</div>

<!-- Ödeme Modal -->
<div class="modal-backdrop" id="odeme-modal">
  <div class="modal">
    <div class="modal-head"><span class="modal-title">Ödeme Ekle</span><button class="close-btn" onclick="closeModal('odeme-modal')"><i class="fas fa-times"></i></button></div>
    <div class="modal-body">
      <div class="form-grid">
        <div class="form-group"><label>Sporcu</label><select><option>Zeynep Arslan</option><option>Ali Öztürk</option><option>Burak Şahin</option></select></div>
        <div class="form-group"><label>Tutar</label><input type="number" placeholder="₺"></div>
        <div class="form-group"><label>Tarih</label><input type="date"></div>
        <div class="form-group"><label>Yöntem</label><select><option>Nakit</option><option>Kredi Kartı</option><option>EFT</option></select></div>
        <div class="form-group full"><label>Not</label><input type="text" placeholder="Mayıs ayı ödemesi..."></div>
      </div>
    </div>
    <div class="modal-foot">
      <button class="btn btn-secondary" onclick="closeModal('odeme-modal')">İptal</button>
      <button class="btn btn-primary" onclick="closeModal('odeme-modal');showToast('Ödeme kaydedildi!')"><i class="fas fa-check"></i> Onayla</button>
    </div>
  </div>
</div>

<!-- Havuz Modal -->
<div class="modal-backdrop" id="havuz-modal">
  <div class="modal">
    <div class="modal-head"><span class="modal-title">Su Değerlerini Güncelle</span><button class="close-btn" onclick="closeModal('havuz-modal')"><i class="fas fa-times"></i></button></div>
    <div class="modal-body">
      <div class="form-grid form-grid-3">
        <div class="form-group"><label>Su Sıcaklığı (°C)</label><input type="number" value="28"></div>
        <div class="form-group"><label>pH Değeri</label><input type="number" step="0.1" value="7.4"></div>
        <div class="form-group"><label>Klor (mg/L)</label><input type="number" step="0.1" value="1.2"></div>
        <div class="form-group"><label>Ölçüm Tarihi</label><input type="date"></div>
        <div class="form-group"><label>Ölçen Kişi</label><input type="text" placeholder="Ad Soyad"></div>
      </div>
    </div>
    <div class="modal-foot">
      <button class="btn btn-secondary" onclick="closeModal('havuz-modal')">İptal</button>
      <button class="btn btn-primary" onclick="closeModal('havuz-modal');showToast('Havuz değerleri güncellendi!')"><i class="fas fa-save"></i> Kaydet</button>
    </div>
  </div>
</div>

<!-- Ders Modal -->
<div class="modal-backdrop" id="ders-modal">
  <div class="modal">
    <div class="modal-head"><span class="modal-title">Ders Ekle</span><button class="close-btn" onclick="closeModal('ders-modal')"><i class="fas fa-times"></i></button></div>
    <div class="modal-body">
      <div class="form-grid">
        <div class="form-group"><label>Grup</label><select><option>Başlangıç A</option><option>Başlangıç B</option><option>Orta Seviye</option><option>İleri Seviye</option><option>Yarışma</option></select></div>
        <div class="form-group"><label>Antrenör</label><select><option>Ahmet H.</option><option>Sevda K.</option><option>Murat B.</option><option>Elif T.</option></select></div>
        <div class="form-group"><label>Tarih</label><input type="date"></div>
        <div class="form-group"><label>Saat</label><input type="time" value="10:00"></div>
        <div class="form-group"><label>Süre (dk)</label><input type="number" value="60"></div>
        <div class="form-group"><label>Şerit</label><select><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option></select></div>
      </div>
    </div>
    <div class="modal-foot">
      <button class="btn btn-secondary" onclick="closeModal('ders-modal')">İptal</button>
      <button class="btn btn-primary" onclick="closeModal('ders-modal');showToast('Ders eklendi!')"><i class="fas fa-save"></i> Kaydet</button>
    </div>
  </div>
</div>

<!-- Bakım Modal -->
<div class="modal-backdrop" id="bakim-modal">
  <div class="modal">
    <div class="modal-head"><span class="modal-title">Bakım Ekle</span><button class="close-btn" onclick="closeModal('bakim-modal')"><i class="fas fa-times"></i></button></div>
    <div class="modal-body">
      <div class="form-grid">
        <div class="form-group"><label>Bakım Türü</label><input type="text" placeholder="Filtre Temizliği..."></div>
        <div class="form-group"><label>Sorumlu</label><input type="text" placeholder="Teknik Ekip"></div>
        <div class="form-group"><label>Tarih</label><input type="date"></div>
        <div class="form-group"><label>Tekrar Periyodu</label><select><option>Haftalık</option><option>2 Haftada bir</option><option>Aylık</option><option>3 Aylık</option></select></div>
        <div class="form-group full"><label>Açıklama</label><textarea placeholder="Bakım detayları..."></textarea></div>
      </div>
    </div>
    <div class="modal-foot">
      <button class="btn btn-secondary" onclick="closeModal('bakim-modal')">İptal</button>
      <button class="btn btn-primary" onclick="closeModal('bakim-modal');showToast('Bakım planı eklendi!')"><i class="fas fa-save"></i> Kaydet</button>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>

<!-- Hızlı Sporcu Kayıtı İşlem Sonucu -->
<?php if(isset($_SESSION['sporcuKayitSuccess'])): ?>

<script>
    window.onload = function() {
        showToast("<?= $_SESSION['sporcuKayitSuccess']; ?>");
    }
</script>

<?php unset($_SESSION['sporcuKayitSuccess']); ?>
<?php endif; ?>


<?php if(isset($_SESSION['sporcuKayitEerror'])): ?>

<script>
    window.onload = function() {
        showToast("<?= $_SESSION['sporcuKayitEerror']; ?>");
    }
</script>

<?php unset($_SESSION['sporcuKayitEerror']); ?>
<?php endif; ?>