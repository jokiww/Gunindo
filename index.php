<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>STOK UNIT STABILIZER</title>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(135deg, #e3e9f3 0%, #f0f4f8 100%);
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      color: #2d3748;
      padding: 30px 20px;
      min-height: 100vh;
      position: relative;
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: 
        radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(183, 193, 255, 0.1) 0%, transparent 50%);
      pointer-events: none;
      z-index: -1;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    h2 {
      text-align: center;
      margin-bottom: 40px;
      font-weight: 700;
      font-size: 2.5rem;
      color: #2d3748;
      text-shadow: 2px 2px 10px rgba(255, 255, 255, 0.8);
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      position: relative;
    }

    h2::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 2px;
      box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
    }

    #filters {
      display: flex;
      justify-content: center;
      gap: 30px;
      margin-bottom: 40px;
      flex-wrap: wrap;
      padding: 30px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      box-shadow: 
        12px 12px 24px rgba(174, 188, 207, 0.4),
        -12px -12px 24px rgba(255, 255, 255, 0.9),
        inset 2px 2px 8px rgba(255, 255, 255, 0.3);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    #filters label {
      font-weight: 600;
      margin-right: 12px;
      color: #4a5568;
      user-select: none;
      align-self: center;
      font-size: 1.1rem;
      text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
    }

    #filters select {
      padding: 15px 20px;
      border-radius: 16px;
      border: none;
      background: #e8ecf4;
      box-shadow: 
        8px 8px 16px rgba(174, 188, 207, 0.4),
        -8px -8px 16px rgba(255, 255, 255, 0.8);
      font-size: 1rem;
      color: #4a5568;
      min-width: 160px;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
    }

    #filters select:hover {
      transform: translateY(-2px);
      box-shadow: 
        10px 10px 20px rgba(174, 188, 207, 0.5),
        -10px -10px 20px rgba(255, 255, 255, 0.9);
    }

    #filters select:focus {
      outline: none;
      box-shadow: 
        inset 6px 6px 12px rgba(174, 188, 207, 0.4),
        inset -6px -6px 12px rgba(255, 255, 255, 0.8),
        0 0 0 3px rgba(102, 126, 234, 0.2);
      color: #2d3748;
    }

    .stok-kosong {
      color: #e53e3e;
      font-weight: 700;
      text-shadow: 1px 1px 3px rgba(229, 62, 62, 0.3);
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.7; }
    }

    .low-stock {
      color: #dd6b20;
      font-weight: 700;
      text-shadow: 1px 1px 3px rgba(221, 107, 32, 0.3);
    }

    /* DataTables Neumorphic Styling */
    .dataTables_wrapper {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 24px;
      padding: 30px;
      box-shadow: 
        16px 16px 32px rgba(174, 188, 207, 0.4),
        -16px -16px 32px rgba(255, 255, 255, 0.9);
      border: 1px solid rgba(255, 255, 255, 0.2);
      margin-top: 20px;
    }

    .dataTables_filter {
      margin-bottom: 20px;
    }

    .dataTables_filter input {
      padding: 12px 18px;
      border-radius: 12px;
      border: none;
      background: #e8ecf4;
      box-shadow: 
        inset 4px 4px 8px rgba(174, 188, 207, 0.4),
        inset -4px -4px 8px rgba(255, 255, 255, 0.8);
      font-size: 1rem;
      color: #4a5568;
      transition: all 0.3s ease;
      width: 300px;
    }

    .dataTables_filter input:focus {
      outline: none;
      box-shadow: 
        inset 6px 6px 12px rgba(174, 188, 207, 0.5),
        inset -6px -6px 12px rgba(255, 255, 255, 0.9),
        0 0 0 3px rgba(102, 126, 234, 0.2);
    }

    table.dataTable {
      background: transparent;
      border-collapse: separate;
      border-spacing: 8px;
    }

    table.dataTable thead th {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      padding: 18px 15px;
      border-radius: 12px;
      font-weight: 600;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
      box-shadow: 
        4px 4px 12px rgba(102, 126, 234, 0.3),
        -2px -2px 8px rgba(255, 255, 255, 0.1);
      position: relative;
      font-size: 1rem;
    }

    table.dataTable tbody td {
      background: rgba(255, 255, 255, 0.8);
      backdrop-filter: blur(5px);
      border: none;
      padding: 16px 15px;
      border-radius: 10px;
      box-shadow: 
        3px 3px 8px rgba(174, 188, 207, 0.3),
        -3px -3px 8px rgba(255, 255, 255, 0.7);
      cursor: pointer;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      font-weight: 500;
      color: #2d3748;
    }

    table.dataTable tbody tr:hover td {
      transform: translateY(-2px);
      box-shadow: 
        5px 5px 15px rgba(174, 188, 207, 0.4),
        -5px -5px 15px rgba(255, 255, 255, 0.8);
      background: rgba(255, 255, 255, 0.9);
    }

    td.details-control {
      background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>') !important;
      background-repeat: no-repeat !important;
      background-position: center center !important;
      background-size: 16px 16px !important;
      width: 50px;
      text-align: center;
      position: relative;
    }

    tr.shown td.details-control {
      background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/></svg>') !important;
    }

    .child {
      background: rgba(255, 255, 255, 0.95) !important;
      backdrop-filter: blur(10px) !important;
      border-radius: 16px !important;
      padding: 20px !important;
      margin: 10px 0 !important;
      box-shadow: 
        inset 4px 4px 12px rgba(174, 188, 207, 0.2),
        inset -4px -4px 12px rgba(255, 255, 255, 0.8),
        2px 2px 8px rgba(174, 188, 207, 0.3) !important;
    }

    .child table {
      border-radius: 12px;
      overflow: hidden;
      background: transparent;
      box-shadow: none;
    }

    .child table th {
      background: linear-gradient(135deg, #a8b5d1 0%, #c8d0e7 100%);
      color: #2d3748;
      padding: 12px;
      font-weight: 600;
      text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
    }

    .child table td {
      background: rgba(255, 255, 255, 0.7);
      padding: 10px 12px;
      border-bottom: 1px solid rgba(174, 188, 207, 0.2);
      font-weight: 500;
    }

    .child table tbody tr:nth-child(even) td {
      background: rgba(248, 250, 252, 0.8);
    }

    .dataTables_info, .dataTables_paginate {
      margin-top: 25px;
      font-weight: 500;
      color: #4a5568;
    }

    .dataTables_paginate .paginate_button {
      padding: 8px 16px !important;
      margin: 0 4px !important;
      border-radius: 10px !important;
      border: none !important;
      background: #e8ecf4 !important;
      box-shadow: 
        4px 4px 8px rgba(174, 188, 207, 0.4),
        -4px -4px 8px rgba(255, 255, 255, 0.8) !important;
      color: #4a5568 !important;
      font-weight: 500 !important;
      transition: all 0.3s ease !important;
    }

    .dataTables_paginate .paginate_button:hover {
      transform: translateY(-2px) !important;
      box-shadow: 
        6px 6px 12px rgba(174, 188, 207, 0.5),
        -6px -6px 12px rgba(255, 255, 255, 0.9) !important;
      color: #2d3748 !important;
      background: #f7fafc !important;
    }

    .dataTables_paginate .paginate_button.current {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
      color: white !important;
      box-shadow: 
        inset 2px 2px 6px rgba(0, 0, 0, 0.2),
        4px 4px 12px rgba(102, 126, 234, 0.3) !important;
    }

    .dataTables_length select {
      padding: 8px 12px;
      border-radius: 8px;
      border: none;
      background: #e8ecf4;
      box-shadow: 
        inset 3px 3px 6px rgba(174, 188, 207, 0.4),
        inset -3px -3px 6px rgba(255, 255, 255, 0.8);
      color: #4a5568;
      font-weight: 500;
    }

    /* Loading Animation */
    .loading {
      display: inline-block;
      width: 40px;
      height: 40px;
      border: 4px solid rgba(102, 126, 234, 0.3);
      border-radius: 50%;
      border-top-color: #667eea;
      animation: spin 1s ease-in-out infinite;
      margin: 20px auto;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      body {
        padding: 20px 10px;
      }

      h2 {
        font-size: 2rem;
        margin-bottom: 30px;
      }

      #filters {
        flex-direction: column;
        align-items: center;
        gap: 20px;
        padding: 25px 20px;
      }

      #filters select {
        min-width: 200px;
      }

      .dataTables_wrapper {
        padding: 20px;
      }

      .dataTables_filter input {
        width: 100%;
        max-width: 280px;
      }

      table.dataTable tbody td {
        padding: 12px 10px;
        font-size: 0.95rem;
      }

      table.dataTable thead th {
        padding: 15px 10px;
        font-size: 0.95rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>STOK UNIT STABILIZER</h2>

    <div id="filters">
      <label for="filterTipe">Filter Tipe:</label>
      <select id="filterTipe">
        <option value="ALL">Semua Tipe</option>
        <option value="1 PHASE">1 PHASE</option>
        <option value="3 PHASE">3 PHASE</option>
        <option value="SBW">SBW</option>
        <option value="SJW">SJW</option>
        <option value="OHM SAKLAR">OHM SAKLAR</option>
      </select>
    </div>

    <table id="stokTable" class="display" style="width:100%">
      <thead>
        <tr>
          <th></th>
          <th>Nama Unit</th>
          <th>Tipe</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

  <script>
    const sheetID = "1Fg7_T1gqF_i8jX_JLgaiSZyD3S2Ka7VJrOc43fYc4Bo";
    const sheetName = "STOK";
    const apiKey = "AIzaSyBqkGkd4phUT_Hc9QRN8YiA-w9OQrpEAmg";

    const tipeRanges = {
      "1 PHASE": { startRow: 12, endRow: 22 },
      "3 PHASE": { startRow: 26, endRow: 35 },
      "SBW": { startRow: 38, endRow: 54 },
      "SJW": { startRow: 56, endRow: 63 },
      "OHM SAKLAR": { startRow: 64, endRow: 64 }
    };

    const kategoriCols = {
      LA: 1,
      LD: 2,
      KD: 3,
      SKD: 4,
      KA: 5,
      DG: 6,
      SG: 7,
      SEC: 8
    };

    // Aturan kategori untuk setiap baris
    // Aturan kategori untuk setiap baris - DIPERBAIKI
// Aturan kategori untuk setiap baris - DIPERBAIKI (INDEX DITURUNKAN 1)
const kategoriRules = {
  12: ['LA', 'KA'], // AVR - 0,5 GS - B13 (index 12)
  13: ['LA', 'KA'], // B14 (index 13)
  14: ['LA', 'KA'], // B15 (index 14)
  15: ['LD', 'SKD'], // AVR - 2 GS - B16 (index 15)
  16: ['LD', 'SKD'], // B17 (index 16)
  17: ['LD', 'SKD'], // B18 (index 17)
  18: ['LD', 'SKD'], // B19 (index 18)
  19: ['LD', 'SKD'], // B20 (index 19)
  20: ['LD', 'KD', 'SKD'], // B21 (index 20)
  21: ['LD', 'KD', 'SKD'], // B22 (index 21)
  22: ['LD', 'KD', 'SKD'], // B23 (index 22)
  // B27 dihilangkan (row 27 tidak ditampilkan)
  27: ['LD', 'SKD'], // B28 (index 27) - Semua kecuali LD dan SKD
  28: ['LD', 'KD', 'SKD'], // AVR - 9 GT - B29 (index 28)
  29: ['LD', 'KD', 'SKD'], // B30 (index 29)
  30: ['LD', 'KD', 'SKD'], // B31 (index 30)
  31: ['LD', 'KD', 'SKD'], // B32 (index 31)
  32: ['LD', 'KD', 'SKD'], // B33 (index 32) - DITAMBAHKAN
  33: ['LD', 'KD', 'SKD'], // B34 (index 33)
  34: ['LD', 'KD', 'SKD'], // B35 (index 34)
  // B36 dihilangkan (row 36 tidak ditampilkan)
  38: ['LD', 'KD', 'SKD'], // SBW - 60 GT - B39 (index 38)
  39: ['LD', 'KD', 'SKD'], // B40 (index 39)
  40: ['LD', 'KD', 'SKD'], // B41 (index 40)
  41: ['LD', 'KD', 'SKD'], // B42 (index 41)
  42: ['LD', 'KD', 'SKD'], // B43 (index 42)
  43: ['LD', 'KD', 'SKD'], // B44 (index 43)
  44: ['LD', 'KD', 'SKD'], // B45 (index 44)
  45: ['LD', 'KD', 'SKD'], // B46 (index 45)
  46: ['LD', 'KD', 'SKD'], // B47 (index 46)
  47: ['LD', 'KD', 'SKD'], // B48 (index 47)
  48: ['LD', 'KD', 'SKD'], // B49 (index 48)
  49: ['LD', 'KD', 'SKD'], // B50 (index 49)
  50: ['LD', 'KD', 'SKD'], // B51 (index 50)
  51: ['LD', 'KD', 'SKD'], // B52 (index 51)
  52: ['LD', 'KD', 'SKD'], // B53 (index 52)
  53: ['LD', 'KD', 'SKD'], // B54 (index 53)
  54: ['LD', 'KD', 'SKD'], // B55 (index 54)
  56: ['LD', 'KD', 'SKD'], // SJW - 30 GT - B57 (index 56)
  57: ['LD', 'KD', 'SKD'], // B58 (index 57)
  58: ['LD', 'KD', 'SKD'], // B59 (index 58)
  59: ['LD', 'KD', 'SKD'], // B60 (index 59)
  60: ['LD', 'KD', 'SKD'], // B61 (index 60)
  61: ['LD', 'KD', 'SKD'], // B62 (index 61)
  62: ['LD', 'KD', 'SKD'], // B63 (index 62)
  63: ['LD', 'KD', 'SKD'], // B64 (index 63)
  64: 'TOTAL', // Khusus untuk B65 (index 64) - menampilkan total stok
  65: ['LD', 'KD', 'SKD'] // B66 (index 65)
};

    // Baris yang harus dihilangkan
    const excludedRows = [26, 35];

    let allData = [];
    let dataTable;

    function fetchDataFromSheet() {
      return fetch(`https://sheets.googleapis.com/v4/spreadsheets/${sheetID}/values/${sheetName}!B1:J100?key=${apiKey}`)
        .then(res => res.json())
        .then(data => data.values || []);
    }

    function prepareData(rows) {
      let result = [];
      for (const tipe in tipeRanges) {
        const { startRow, endRow } = tipeRanges[tipe];
        for (let i = startRow; i <= endRow; i++) {
          // Skip baris yang harus dihilangkan
          if (excludedRows.includes(i)) continue;
          
          const row = rows[i] || [];
          const namaUnit = (row[0] || '').trim();
          if (namaUnit === '') continue;

          let stokKategori = {};
          
          // Cek apakah ada aturan kategori khusus untuk baris ini
          const allowedKategori = kategoriRules[i];
          
          if (allowedKategori === 'TOTAL') {
            // Khusus untuk B65 - hitung total stok dari semua kategori
            let totalStok = 0;
            for (const kategori in kategoriCols) {
              const colIndex = kategoriCols[kategori];
              const val = row[colIndex] || '0';
              const num = Number(val);
              if (!isNaN(num)) {
                totalStok += num;
              }
            }
            stokKategori['TOTAL'] = { 
              val: `TOTAL STOK = ${totalStok}`, 
              className: totalStok === 0 ? 'stok-kosong' : (totalStok < 5 ? 'low-stock' : '') 
            };
          } else if (Array.isArray(allowedKategori)) {
            // Gunakan kategori yang diizinkan saja
            for (const kategori of allowedKategori) {
              if (kategoriCols[kategori] !== undefined) {
                const colIndex = kategoriCols[kategori];
                let val = row[colIndex] || '';
                let total = Number(val);
                let className = '';

                if (val.trim() === '' || val.trim() === '0' || isNaN(total)) {
                  val = 'STOK KOSONG';
                  className = 'stok-kosong';
                } else if (total < 5) {
                  className = 'low-stock';
                }

                stokKategori[kategori] = { val, className };
              }
            }
          } else {
            // Jika tidak ada aturan khusus, tampilkan semua kategori (fallback)
            for (const kategori in kategoriCols) {
              const colIndex = kategoriCols[kategori];
              let val = row[colIndex] || '';
              let total = Number(val);
              let className = '';

              if (val.trim() === '' || val.trim() === '0' || isNaN(total)) {
                val = 'STOK KOSONG';
                className = 'stok-kosong';
              } else if (total < 5) {
                className = 'low-stock';
              }

              stokKategori[kategori] = { val, className };
            }
          }

          result.push({ tipe, namaUnit, stokKategori, rowIndex: i });
        }
      }
      return result;
    }

    function formatDetailRow(stokKategori) {
      let html = `<table style="width:100%; border-collapse:collapse;">`;
      html += `<thead><tr><th style="text-align:left;padding:12px;">Kategori</th><th style="padding:12px;">Stok</th></tr></thead><tbody>`;
      
      // Cek apakah ini adalah row khusus TOTAL
      if (stokKategori['TOTAL']) {
        const { val, className } = stokKategori['TOTAL'];
        html += `<tr><td style="padding:10px 12px; font-weight: 600;">TOTAL STOK</td><td class="${className}" style="padding:10px 12px; font-weight: 600;">${val}</td></tr>`;
      } else {
        // Tampilkan kategori sesuai urutan yang logis
        const urutanKategori = ['LA', 'LD', 'KD', 'SKD', 'KA', 'DG', 'SG', 'SEC'];
        
        for (const kat of urutanKategori) {
          if (stokKategori[kat]) {
            const { val, className } = stokKategori[kat];
            html += `<tr><td style="padding:10px 12px;">${kat}</td><td class="${className}" style="padding:10px 12px;">${val}</td></tr>`;
          }
        }
      }
      
      html += `</tbody></table>`;
      return html;
    }

    $(document).ready(function() {
      // Function to check if two data arrays are equal (simple deep compare)
      function isDataEqual(data1, data2) {
        return JSON.stringify(data1) === JSON.stringify(data2);
      }

      function refreshData() {
        fetchDataFromSheet().then(rows => {
          const newData = prepareData(rows);
          if (!isDataEqual(newData, allData)) {
            allData = newData;
            const currentFilter = $('#filterTipe').val() || "ALL";
            loadTable(currentFilter);
          }
        });
      }

      fetchDataFromSheet().then(rows => {
        allData = prepareData(rows);
        loadTable("ALL");
      });

      // Set interval to refresh data every 15 seconds
      setInterval(refreshData, 15000);

      $('#filterTipe').on('change', function () {
        const filter = $(this).val();
        loadTable(filter);
      });

      function loadTable(filter) {
        const filteredData = filter === "ALL" ? allData : allData.filter(d => d.tipe === filter);

        if ($.fn.DataTable.isDataTable('#stokTable')) {
          dataTable.clear().destroy();
        }

        dataTable = $('#stokTable').DataTable({
          data: filteredData,
          columns: [
            {
              className: 'details-control',
              orderable: false,
              data: null,
              defaultContent: ''
            },
            { data: 'namaUnit' },
            { data: 'tipe' }
          ],
          order: [[1, 'asc']],
          paging: true,
          searching: true,
          info: true
        });

        $('#stokTable tbody').off('click').on('click', 'td.details-control', function () {
          const tr = $(this).closest('tr');
          const row = dataTable.row(tr);

          if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
          } else {
            row.child(formatDetailRow(row.data().stokKategori)).show();
            tr.addClass('shown');
          }
        });
      }
    });
  </script>
</body>
</html>
