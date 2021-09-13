<script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#state_id').change(function () {
                let state_id = $(this).val();
                $('#municipality_id').html('<option>Select Municipality</option>');
                $.ajax({
                    url: '/getDistrict',
                    method: 'POST',
                    data: 'state_id=' + state_id + '&_token={{ csrf_token() }}',
                    success: function (result) {
                        $('#district_id').html(result);
                    },
                });
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#district_id').change(function () {
                let district_id = $(this).val();
                $.ajax({
                    url: '/getMunicipality',
                    method: 'POST',
                    data: 'district_id=' + district_id + '&_token={{ csrf_token() }}',
                    success: function (res) {
                        $('#municipality_id').html(res);
                    }
                });
            })
        });
    </script>

</script>