<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <style type="text/css">
  /* CLIENT-SPECIFIC STYLES */
  body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
  table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
  img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

  /* RESET STYLES */
  img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
  table{border-collapse: collapse !important;}
  body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

  /* iOS BLUE LINKS */
  a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
  }

  /* MOBILE STYLES */
  @media screen and (max-width: 525px) {

    /* ALLOWS FOR FLUID TABLES */
    .wrapper {
      width: 100% !important;
      max-width: 100% !important;
    }

    /* ADJUSTS LAYOUT OF LOGO IMAGE */
    .logo img {
      margin: 0 auto !important;
    }

    /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
    .mobile-hide {
      display: none !important;
    }

    .img-max {
      max-width: 100% !important;
      width: 100% !important;
      height: auto !important;
    }

    /* FULL-WIDTH TABLES */
    .responsive-table {
      width: 100% !important;
    }

    /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
    .padding {
      padding: 10px 5% 15px 5% !important;
    }

    .padding-meta {
      padding: 30px 5% 0px 5% !important;
      text-align: center;
    }

    .padding-copy {
     padding: 10px 5% 10px 5% !important;
     text-align: center;
   }

   .no-padding {
    padding: 0 !important;
  }

  .section-padding {
    padding: 50px 15px 50px 15px !important;
  }

  /* ADJUST BUTTONS ON MOBILE */
  .mobile-button-container {
    margin: 0 auto;
    width: 100% !important;
  }

  .mobile-button {
    padding: 15px !important;
    border: 0 !important;
    font-size: 16px !important;
    display: block !important;
  }

}

/* ANDROID CENTER FIX */
div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="margin: 0 !important; padding: 0 !important;">

  <!-- HEADER -->
  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" align="center">
    <tr>
      <td bgcolor="#ffffff" align="center" style="padding: 15px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
          <tr>
            <td>
              <!-- COPY -->
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center" style="font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">Lupa Password SIPAJU</td>
                </tr>
              </table>

            </td>
          </tr>
        </table>
      </td>

    </tr>

    <tr>
      <td bgcolor="#ffffff" align="center" style="padding: 15px;" class="padding">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">

         <tr>
          <td style="padding: 10px 0 0 0; border-top: 1px dashed #aaaaaa;"> 
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" style="font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;" class="padding-copy">Dear, <?php echo $nim;?>,<br></td>
              </tr>
              <tr>
                <td align="left" style="font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;" class="padding-copy">Kode Teledor untuk akun <?php echo $nim.' adalah <br>'.$code;?></td>
              </tr>
              <tr>
                <td align="left" style="font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333;" class="padding-copy">Masukkan kode pada</td>
              </tr>
            </table>
          </td>
        </tr>
      </td>
    </tr>
    <tr>
      <td bgcolor="#ffffff" align="center" style="padding: 15px;">
        <table border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center">
                    <!-- BULLETPROOF BUTTON -->
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="center" style="padding-top: 25px;" class="padding">
                          <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                            <tr>
                              <td align="center" style="border-radius: 3px;" bgcolor="#256F9C"><a href="<?php echo base_url();?>lupa/second" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;" class="mobile-button">Lupa Password SIPAJU</a></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <!-- COPY -->
                  <td align="center" style="font-size: 24px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 15px;" class="padding-copy"></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
      <tr>
        <td align="center" style="padding: 10px 0 0 0; border-top: 1px dashed #aaaaaa; max-width: 500px;"> 
          <table width="100%" border="0" cellspacing="0" cellpadding="0"  style="max-width: 500px;">
            <tr>
              <td align="left" style="font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 2em; padding-bottom: 2em;" class="padding-copy">Regards,
                <br>SIPAJU ❤</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td bgcolor="#ffffff" align="center" style="padding: 20px 0px; border-top: 1px dashed #aaaaaa; max-width: 500px;">
            <!-- UNSUBSCRIBE COPY -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
              <tr>
                <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                  Jalan Otto Iskandardinata Raya No 64C, Kampung Melayu, Jakarta Timur, DKI Jakarta
                  <br>
                  <a href="http://stislimatuju.com" target="_blank" style="color: #666666; text-decoration: none;">Kunjungi SIPAJU</a>                        
                </td>
              </tr>
            </table>  
          </td>
        </tr>
    </table>

  </body>
  </html>