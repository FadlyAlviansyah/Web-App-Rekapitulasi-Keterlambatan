<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Surat Pernyataan</title>
  <style>
    *{
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .container {
      padding: 50px;
    }

    .header h2{
      text-transform: uppercase;
      background: red;
      text-align: center;
    }

    .content {
      margin-top: 40px;
    }

  </style>
</head>
<body>
  <div class="container">
    <p style="text-align: center;"><span style="font-family: Arial, Helvetica, sans-serif;"><strong><span style="font-size: 16px;">SURAT PERNYATAN</span></strong><span style="font-size: 16px;"><br><strong>TIDAK AKAN DATANG TERLAMBAT KE SEKOLAH</strong></span></span></p>
    <p style="text-align: left;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;"><br></span></p>
    <table style="width: 51%; border-collapse: collapse; border: none rgb(0, 0, 0);">
    <tbody>
    <tr>
      <td style="width: 99.5086%; border: none rgb(0, 0, 0);" colspan="3"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">Yang bertanda tangan di bawah ini:<br></span></td>
    </tr>
    <tr>
      <td style="width: 29.1708%; border: none rgb(0, 0, 0);"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">NIS</span></td>
      <td style="width: 7.6505%; border: none rgb(0, 0, 0);"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">:</span></td>
      <td style="width: 62.8655%; border: none rgb(0, 0, 0);"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">{{ $student['nis'] }}</span></td>
    </tr>
    <tr>
      <td style="width: 29.1708%; border: none rgb(0, 0, 0);"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">Nama</span></td>
      <td style="width: 7.6505%; border: none rgb(0, 0, 0);"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">:</span></td>
      <td style="width: 62.8655%; border: none rgb(0, 0, 0);"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">{{ $student['name'] }}</span></td>
    </tr>
    <tr>
      <td style="width: 29.1708%; border: none rgb(0, 0, 0);"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">Rombel</span></td>
      <td style="width: 7.6505%; border: none rgb(0, 0, 0);"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">:</span></td>
      <td style="width: 62.8655%; border: none rgb(0, 0, 0);"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">{{ $student['rombel']['rombel'] }}</span></td>
    </tr>
    <tr>
      <td style="width: 29.1708%; border: none rgb(0, 0, 0);"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">Rayon</span></td>
      <td style="width: 7.6505%; border: none rgb(0, 0, 0);"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">:&nbsp;</span></td>
      <td style="width: 62.8655%; border: none rgb(0, 0, 0);"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">{{ $student['rayon']['rayon'] }}</span></td>
    </tr>
    </tbody>
    </table>
    <p><br></p>
    <p><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat datang ke sekolah sebanyak <strong>3 Kali</strong> yang mana hal tersebut termasuk kedalam pelanggaran kedisiplinan. Saya berjanji tidak akan terlambat datang ke sekolah lagi. Apabila saya terlambat datang ke sekolah lagi saya siap diberikan sanksi yang sesuai dengan peraturan sekolah.</span></p>
    <p><br></p>
    <p><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">Demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan.</span></p>
    <p><br></p>
    <table style="width: 100%; border-collapse: collapse; border: none rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;">
      <tbody>
        <tr>
          <td style="width: 33.3333%; border: none rgb(0, 0, 0);"><br></td>
          <td style="width: 33.3333%; border: none rgb(0, 0, 0);"><br></td>
          @php
            setlocale(LC_ALL, 'IND');
          @endphp
          <td style="width: 33.3334%; border: none rgb(0, 0, 0); text-align: center;">Bogor, {{ Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</td>
        </tr>
        <tr>
          <td style="width: 33.3333%; border: none rgb(0, 0, 0); text-align: center;">Peserta Didik,</td>
          <td style="width: 33.3333%; border: none rgb(0, 0, 0);"><br></td>
          <td style="width: 33.3334%; border: none rgb(0, 0, 0); text-align: center;">Orang Tua/Wali Peserta Didik,</td>
        </tr>
        <tr>
          <td style="width: 33.3333%; border: none rgb(0, 0, 0); text-align: center;"><br><br><br><br><br><br><br>({{ $student['name'] }})</td>
          <td style="width: 33.3333%; border: none rgb(0, 0, 0);"><br></td>
          <td style="width: 33.3334%; border: none rgb(0, 0, 0); text-align: center;"><br><br><br><br><br>(........................)</td>
        </tr>
        <tr>
          <td style="width: 33.3333%; border: none rgb(0, 0, 0);"><br></td>
          <td style="width: 33.3333%; border: none rgb(0, 0, 0);"><br></td>
          <td style="width: 33.3334%; border: none rgb(0, 0, 0);"><br></td>
        </tr>
        <tr>
          <td style="width: 33.3333%; border: none rgb(0, 0, 0); text-align: center;">Pembimbing Siswa,</td>
          <td style="width: 33.3333%; border: none rgb(0, 0, 0);"><br></td>
          <td style="width: 33.3334%; border: none rgb(0, 0, 0); text-align: center;">Kesiswaan</td>
        </tr>
        <tr>
          <td style="width: 33.3333%; border: none rgb(0, 0, 0); text-align: center;"><br><br><br><br><br><br><br>({{ $student['rayon']['user']['name'] }})<br></td>
          <td style="width: 33.3333%; border: none rgb(0, 0, 0);"><br></td>
          <td style="width: 33.3334%; border: none rgb(0, 0, 0); text-align: center;"><br><br><br><br><br>(........................)<br></td>
        </tr>
      </tbody>
    </table>
    <p><br></p>
  </div>
</body>
</html>