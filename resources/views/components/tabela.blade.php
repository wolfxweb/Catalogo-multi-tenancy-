<div class="{{$classDivTabela}} ">
    <table class="table table-striped table-hover {{$classTabela}} ">
        <thead>
            <tr>
                {{$thead}}
            </tr>
        </thead>
        <tbody>
            {{$tbody}}
        </tbody>
        <tfoot>
            {{$tfoot??""}} <!-- ternario normal -->
        </tfoot>
    </table>
     {{$paginacao??""}} <!-- ternario curto -->
</div>
