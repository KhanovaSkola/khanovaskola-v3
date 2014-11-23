var NameInput = React.createClass({displayName: 'NameInput',
	render: function() {
		return (
			React.createElement("div", null, 
				React.createElement("div", {className: "form-group"}, 
					React.createElement("label", {htmlFor: "name"}, "Název cvičení"), 
					React.createElement("input", {type: "text", name: "name", id: "name", className: "form-control"})
				)
			)
		);
	}
});
var DescriptionInput = React.createClass({displayName: 'DescriptionInput',
	render: function() {
		return (
			React.createElement("div", null, 
				React.createElement("div", {className: "form-group"}, 
					React.createElement("label", {htmlFor: "description"}, "Detailnější popis"), 
					React.createElement("input", {type: "text", name: "description", id: "description", className: "form-control"})
				)
			)
		);
	}
});
var BlueprintEditor = React.createClass({displayName: 'BlueprintEditor',
	render: function() {
		return (
			React.createElement("div", null, 
				"Editor", 
				React.createElement("form", null, 
					React.createElement(NameInput, null), 
					React.createElement(DescriptionInput, null)
				)
			)
		);
	}
});
React.render(React.createElement(BlueprintEditor, null), document.getElementById('blueprint-editor'));
