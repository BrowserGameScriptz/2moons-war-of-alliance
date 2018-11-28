{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text">Жалоба</div>
</div>
<div id="popup">
	
<table style="width:100%">
	<tr>
		<th colspan="2">
			Жалоба на сообщение
		</th>
	</tr>
	<tr>
		<td>
			{$LNG.mg_message}
		</td>
		<td>
			от
		</td>
	</tr>
	<tr>
		<td style="width:75%">
			:)
		</td>
		<td>
			webspelleu [1:253:6]
		</td>
	</tr>
</table>
<form action="game.php?page=complaintMsg" method="post">
<input type="hidden" name="mode" value="send" />
<input type="hidden" name="id" value="208121" />
<table style="width:100%">
	<tr>
		<th colspan="2">
			Форма жалобы
		</th>
	</tr>
	<tr>
		<td>
			<input type="radio" name="type_compl" value="1">Оскорбление, мат, угрозы</input>
		</td>
		<td>
			<input type="radio" name="type_compl" value="2">Реклама, спам</input>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<textarea class="validate[required]" id="message" name="comment" rows="60" cols="8" style="height:100px;">Текст жалобы:</textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" title="Пожаловаться" value="Пожаловаться"><br>
		</td>
	</tr>
</table>
</form>

</div>
{/block}