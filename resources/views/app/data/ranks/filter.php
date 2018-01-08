<form method="post" action="/data/filterPositionsAction">

<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<h4>Fun&ccedil;&otilde;es</h4>			

				<div id="oldPositionsPlaceholder">
				</div>

				<div class="form-group">
				    <div class="col-md-12">
				        <select name="oldPositionsSelector" class="multi-select" multiple="" id="positionsSelect" >
				          @foreach($all_positions as $position)
				          <option value="{{$position->id}}">{{$position->label}} ({{$position->id}})</option>
				          @endforeach
				        </select>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div data-spy="affix" data-offset-top="60" data-offset-bottom="200">
			<div class="list-group">
				<div class="list-group-item">
					<select name="position" class="select2">
						@foreach($positions as $position)
						<option value="{{$position->id}}" >[{{$position->id}}] {{$position->label}}</option>
						@endforeach
					</select>
				</div>
				<div class="list-group-item">
					<button type="submit" class="btn btn-success">Salvar</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">



$(document).ready(function(){
    $('.hiddenCards').hide();
    $(".select2").select2({width: '100%'});

    //multiselect start
    $('#positionsSelect').multiSelect({
        selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
        selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
        afterInit: function (ms) {
            var that = this,
                $selectableSearch = that.$selectableUl.prev(),
                $selectionSearch = that.$selectionUl.prev(),
                selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                .on('keydown', function (e) {
                    if (e.which === 40) {
                        that.$selectableUl.focus();
                        return false;
                    }
                });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                .on('keydown', function (e) {
                    if (e.which == 40) {
                        that.$selectionUl.focus();
                        return false;
                    }
                });
        },
        afterSelect: function (value) {
            this.qs1.cache();
            this.qs2.cache();

            $('#oldPositionsPlaceholder').append('<input id="position-' + value + '" type="hidden" name="oldPositions[]" value="' + value + '" >');
        },
        afterDeselect: function (value) {
            this.qs1.cache();
            this.qs2.cache();

            $('#position-' + value).remove();
        }
    });    
});
</script>