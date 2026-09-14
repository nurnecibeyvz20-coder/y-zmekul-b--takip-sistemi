<!-- Toast -->
<div class="toast" id="toast"><i class="fas fa-check-circle"></i><span id="toast-msg">İşlem başarılı!</span></div>

<script>
const swimmers = [
  { name: 'Elif Kaya', group: 'Başlangıç A', age: 12, sessions: 48, status: 'Aktif', color: '#0A84FF' },
  { name: 'Mert Demir', group: 'Orta Seviye', age: 15, sessions: 72, status: 'Aktif', color: '#00C9A7' },
  { name: 'Zeynep Arslan', group: 'Yarışma', age: 17, sessions: 120, status: 'Aktif', color: '#EF4444' },
  { name: 'Ali Öztürk', group: 'Başlangıç B', age: 9, sessions: 24, status: 'Beklemede', color: '#F59E0B' },
  { name: 'Selin Yıldız', group: 'İleri Seviye', age: 16, sessions: 96, status: 'Aktif', color: '#5B38D0' },
  { name: 'Burak Şahin', group: 'Yarışma', age: 18, sessions: 140, status: 'Aktif', color: '#0A84FF' },
  { name: 'Ayşe Çelik', group: 'Başlangıç A', age: 10, sessions: 36, status: 'Aktif', color: '#00C9A7' },
  { name: 'Kerem Yılmaz', group: 'Orta Seviye', age: 14, sessions: 60, status: 'Aktif', color: '#EF4444' },
];

const coaches = [
  { name: 'Ahmet Hatipoğlu', title: 'Baş Antrenör', cert: 'FINA Level 3', athletes: 18, exp: 12, color: '#0A84FF', tags: ['Serbest', 'Kelebek', 'Yarışma'] },
  { name: 'Sevda Karataş', title: 'Antrenör', cert: 'FINA Level 2', athletes: 12, exp: 7, color: '#00C9A7', tags: ['Kurbağalama', 'Başlangıç'] },
  { name: 'Murat Boran', title: 'Antrenör', cert: 'FINA Level 2', athletes: 10, exp: 5, color: '#F59E0B', tags: ['Sırtüstü', 'İleri Seviye'] },
  { name: 'Elif Toprak', title: 'Yardımcı Antrenör', cert: 'FINA Level 1', athletes: 14, exp: 3, color: '#5B38D0', tags: ['Başlangıç', 'Çocuk'] },
];

function navigate(page, el) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  document.getElementById('page-' + page).classList.add('active');
  if (el) el.classList.add('active');
  const titles = { dashboard: 'Gösterge <span>Paneli</span>', sporcular: 'Sporcu <span>Listesi</span>', kayit: 'Sporcu <span>Kaydı</span>', performans: 'Performans <span>Takibi</span>', antrenorler: 'Antrenör <span>Yönetimi</span>', havuz: 'Havuz <span>Bilgileri</span>', takvim: 'Ders <span>Takvimi</span>', muhasebe: 'Muhasebe <span>Yönetimi</span>', raporlar: 'Raporlar <span>&</span> Analiz', ayarlar: 'Sistem <span>Ayarları</span>' };
  document.getElementById('page-title').innerHTML = titles[page] || page;
  if (page === 'sporcular') renderSwimmers();
  if (page === 'antrenorler') renderCoaches();
  if (page === 'performans') renderPerf();
  if (page === 'takvim') renderCalendar();
}

function renderSwimmers() {
  const g = document.getElementById('swimmer-grid');
  g.innerHTML = swimmers.map(s => {
    const initials = s.name.split(' ').map(n => n[0]).join('');
    const badge = s.status === 'Aktif' ? 'badge-green' : s.status === 'Beklemede' ? 'badge-orange' : 'badge-gray';
    return `<div class="swimmer-card">
      <div class="swimmer-avatar" style="background:${s.color}">${initials}</div>
      <div class="swimmer-name">${s.name}</div>
      <div class="swimmer-meta">${s.group} • ${s.age} yaş</div>
      <span class="badge ${badge}" style="margin-top:6px">${s.status}</span>
      <div class="swimmer-stats">
        <div class="sw-stat"><div class="sw-stat-val">${s.sessions}</div><div class="sw-stat-lbl">Seans</div></div>
        <div class="sw-stat"><div class="sw-stat-val">%92</div><div class="sw-stat-lbl">Devam</div></div>
      </div>
    </div>`;
  }).join('');
}

function renderCoaches() {
  const g = document.getElementById('antrenor-grid');
  g.innerHTML = coaches.map(c => `
    <div class="coach-card">
      <div class="coach-avatar" style="background:${c.color}">${c.name.split(' ').map(n=>n[0]).join('')}</div>
      <div class="coach-info">
        <div class="coach-name">${c.name}</div>
        <div class="coach-title">${c.title} • ${c.cert}</div>
        <div class="coach-tags">${c.tags.map(t => `<span class="coach-tag">${t}</span>`).join('')}</div>
        <div class="coach-stats-row">
          <div class="coach-stat"><div class="coach-stat-val">${c.athletes}</div><div class="coach-stat-lbl">Sporcu</div></div>
          <div class="coach-stat"><div class="coach-stat-val">${c.exp}</div><div class="coach-stat-lbl">Yıl Deneyim</div></div>
        </div>
      </div>
      <div style="display:flex;flex-direction:column;gap:6px;flex-shrink:0">
        <button class="btn btn-secondary btn-sm btn-icon" title="Düzenle"><i class="fas fa-edit"></i></button>
        <button class="btn btn-secondary btn-sm btn-icon" title="Profil"><i class="fas fa-eye"></i></button>
      </div>
    </div>
  `).join('');
}

const perfMetrics = [
  { label: 'Teknik (Serbest)', val: 82, color: '#0A84FF' },
  { label: 'Teknik (Kurbağalama)', val: 74, color: '#00C9A7' },
  { label: 'Kondisyon', val: 88, color: '#5B38D0' },
  { label: 'Başlangıç Tepkisi', val: 70, color: '#F59E0B' },
  { label: 'Dönüş Tekniği', val: 65, color: '#EF4444' },
  { label: 'Ritim & Tempo', val: 78, color: '#00C9A7' },
];

function renderPerf() {
  const bars = document.getElementById('perf-bars');
  bars.innerHTML = perfMetrics.map(m => `
    <div class="perf-bar-row">
      <div class="perf-label">${m.label}</div>
      <div class="perf-bar-bg"><div class="perf-bar" style="width:${m.val}%;background:${m.color}"></div></div>
      <div class="perf-val">${m.val}</div>
    </div>
  `).join('');

  const att = document.getElementById('attendance-grid');
  const days = Array.from({ length: 30 }, (_, i) => {
    const r = Math.random();
    const color = r > 0.8 ? '#EF4444' : r > 0.65 ? '#F59E0B' : '#00C9A7';
    return `<div style="height:44px;border-radius:6px;background:${color};display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff">${i+1}</div>`;
  });
  att.innerHTML = days.join('');
}

function renderCalendar() {
  const grid = document.getElementById('cal-grid');
  const events = { 1:'Baş.A', 3:'Orta', 5:'Yar.', 6:'Baş.B', 8:'İleri', 10:'Baş.A', 12:'Orta', 14:'Yar.', 17:'Baş.A', 19:'Orta', 21:'Yar.', 22:'İleri', 24:'Baş.A', 26:'Orta', 27:'Baş.B', 28:'Yar.' };
  const offset = 3;
  let html = '';
  for (let i = 0; i < offset; i++) html += '<div></div>';
  for (let d = 1; d <= 31; d++) {
    const isToday = d === 19;
    html += `<div class="sched-day${isToday ? ' today' : ''}">
      <div class="sched-day-num">${d}</div>
      ${events[d] ? `<div class="sched-event">${events[d]}</div>` : ''}
      ${d % 7 === 3 ? '<div class="sched-event teal-ev">Özel</div>' : ''}
    </div>`;
  }
  grid.innerHTML = html;
}

function openModal(id) {
  document.getElementById(id).classList.add('open');
}
function closeModal(id) {
  document.getElementById(id).classList.remove('open');
}
document.querySelectorAll('.modal-backdrop').forEach(m => {
  m.addEventListener('click', e => { if (e.target === m) m.classList.remove('open'); });
});

function showToast(msg) {
  const t = document.getElementById('toast');
  document.getElementById('toast-msg').textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3000);
}

function saveSwimmer() {
  const ad = document.getElementById('reg-ad').value;
  const soyad = document.getElementById('reg-soyad').value;
  if (!ad || !soyad) { showToast('Ad ve soyad zorunludur!'); return; }
  showToast(ad + ' ' + soyad + ' başarıyla kaydedildi!');
  clearForm();
}

function clearForm() {
  ['reg-ad','reg-soyad','reg-tc','reg-tel','reg-email','reg-adres','reg-veli','reg-velitel','reg-velimail','reg-sigorta','reg-saglik'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.value = '';
  });
}

// Global search
document.getElementById('global-search').addEventListener('input', function(e) {
  const q = e.target.value.toLowerCase();
  if (q.length > 1) {
    navigate('sporcular', document.querySelectorAll('.nav-item')[1]);
    setTimeout(() => {
      document.querySelectorAll('#swimmer-grid .swimmer-card').forEach(card => {
        const name = card.querySelector('.swimmer-name').textContent.toLowerCase();
        card.style.display = name.includes(q) ? '' : 'none';
      });
    }, 100);
  }
});
</script>
</body>
</html>