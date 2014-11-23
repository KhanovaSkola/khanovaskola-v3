var NameInput = React.createClass({
	render: function() {
		return (
			<div>
				<div className="form-group">
					<label htmlFor="name">Název cvičení</label>
					<input type="text" name="name" id="name" className="form-control" />
				</div>
			</div>
		);
	}
});
var DescriptionInput = React.createClass({
	render: function() {
		return (
			<div>
				<div className="form-group">
					<label htmlFor="description">Detailnější popis</label>
					<input type="text" name="description" id="description" className="form-control" />
				</div>
			</div>
		);
	}
});
var BlueprintEditor = React.createClass({
	render: function() {
		return (
			<div>
				Editor
				<form>
					<NameInput />
					<DescriptionInput />
				</form>
			</div>
		);
	}
});
React.render(<BlueprintEditor />, document.getElementById('blueprint-editor'));
