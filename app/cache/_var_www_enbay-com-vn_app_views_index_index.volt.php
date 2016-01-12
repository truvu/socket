<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title> Home Page </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="/asset/css/index.css"/>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container"></div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="visible-md visible-lg col-md-2 col-lg-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">Calendar</a>
                        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item">Morbi leo risus</a>
                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item">Vestibulum at eros</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-9">
                    
<h4>Time table</h4>
<?php if (empty($list)) { ?>
	<div>
		You have no item. Now <a href="#" id="time-table-create">create an item</a> here?
	</div>
	<table class="table table-bordered" id="table-list" style="display:none;">
		<tr>
			<td style="width:20%;">Date</td>
			<td style="width:40%;">Content</td>
			<td style="width:20%;">Status</td>
			<td colspan="2" style="width:20%;">action</td>
		</tr>
		<tr id="time-table-create-table" class="hidden">
			<td contenteditable data-name="date">mm-dd-yyyy hh:ii:ss:00</td>
			<td contenteditable data-name="content">Shopping</td>
			<td></td>
			<td class="btn btn-default btn-sm text-center" style="width:100%; height:36px; border-radius:0px; border:0;" colspan="1" id="table-add-item">add</td>
		</tr>
	</table>
<?php } else { ?>
	<div>
		<a href="#" id="time-table-create">Create an item</a> here?
	</div>
	<table class="table table-bordered" id="table-list">
		<tr>
			<td style="width:20%;">Date</td>
			<td style="width:40%;">Content</td>
			<td style="width:20%;">Status</td>
			<td style="width:20%;" colspan="2">action</td>
		</tr>
		<tr id="time-table-create-table" class="hidden">
			<td contenteditable data-name="date">mm-dd-yyyy hh:ii:ss</td>
			<td contenteditable data-name="content">Shopping</td>
			<td></td>
			<td class="btn btn-default btn-sm text-center" style="width:100%; height:36px; border-radius:0px; border:0;" colspan="1" id="table-add-item">add</td>
		</tr>
		<?php $now = time(); ?>
		<?php foreach ($list as $item) { ?>
		<tr data-id="<?php echo $item->id; ?>" data-user="<?php echo $item->user; ?>">
			<td contenteditable data-name="date" type="date"><?php echo $item->text_time; ?></td>
			<td contenteditable data-name="content"><?php echo $item->content; ?></td>
			<td data-name="status">
				<?php if ($now == $item->created) { ?> 
					in comming
				<?php } elseif ($now < $item->created) { ?>
					on going
				<?php } else { ?> 
					passed 
				<?php } ?>
			</td>
			<td class="text-center">
				<a href="/timetable/edit/<?php echo $item->id; ?>" class="btn-edit">Update</a>
			</td>
			<td class="text-center">
				<a href="/timetable/delete/<?php echo $item->id; ?>" class="btn-delete">Delete</a>
			</td>
		</tr>
		<?php } ?>
	</table>
<?php } ?>

                </div>
            </div>
        </div>
        <script src="http://localhost:3000/socket.io/socket.io.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="/asset/js/index.js"></script>
    </body>
</html>