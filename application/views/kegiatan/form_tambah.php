<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <form method="post" action="">
        <table>

            <tr>
                <td><label>Kegiatan : </label></td>
                <td><input type="text" name="nama"></td>
            </tr>

            <tr>
                <td><label>Prioritas : </label></td>
                <td>
                    <select name="prioritas">
                        <option value="Biasa">Biasa</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Perlu">Perlu</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label>Penanggung Jawab : </label></td>
                <td><input type="text" name="pj"> </td>
            </tr>

            <tr>
                <td><label>Waktu : </label></td>
                <td><input type="datetime-local" name="tgl"> </td>
            </tr>

            <tr>
                <td>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                    <script type='text/javascript'>
                        $(window).load(function() {
                            $("#lokasi").change(function() {
                                console.log($("#lokasi option:selected").val());
                                if ($("#lokasi option:selected").val() == 'Outdoor') {
                                    $('#ruangan').prop('hidden', 'true');
                                } else {
                                    $('#ruangan').prop('hidden', false);
                                }
                            });
                        });
                    </script>
                    <label>
                        Lokasi : <br />
                <td>
                    <select id="lokasi" name="lokasi">
                        <option value="Outdoor">Outdoor</option>
                        <option value="Indoor">Indoor</option>
                    </select>
                </td>
            <tr>
                <td>
                <td><input type="text" placeholder="Ruangan" name="ruangan" id="ruangan" value="" hidden /></td>
                </td>
            </tr>
            </label>
            </td>
            </tr>

            <tr>
                <td><label>Pelaksana : </label></td>
                <td><input type="text" name="pelaksana"> </td>
            </tr>

            <tr>
                <td><label>Skema : </label></td>
                <td><input type="text" name="skema"> </td>
            </tr>

        </table>
        <input type="submit" name="tombol" value="Simpan" />
    </form>
</body>

</html>