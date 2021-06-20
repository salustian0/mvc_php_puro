<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{url("src/public/js/jquery.js")}}"></script>
<script type="text/javascript" src="{{url("src/public/js/masked_input.js")}}"></script>
<script>
const MODULE_URL = '{{url($module)}}';

    {{if $js_const && count($js_const)}}
        {{foreach item=$value key=$key from=$js_const}}
            const {{$key}} = {{$value}};
        {{/foreach}}
    {{/if}}
</script>

{{if $js && count($js)}}
    {{foreach item=$v from=$js}}
    <script type="text/javascript" src="{{url("src/public/js/{{$v}}")}}"></script>
    {{/foreach}}
{{/if}}
<footer class="col-12 bg-dark text-center py-2 text-light position-fixed" style="height: 50px; bottom:0; z-index:999">
    <p>Desenvolvido por Renan Salustiano &copy - 2021</p>
</footer>
</body>
</html>