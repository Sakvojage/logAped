import ReactDOM from 'react-dom';
import React, {Component} from 'react';

class List extends Component {

    constructor(props) {
        super(props);
        this.state = {
            logs: [],
        };
    }

    componentDidMount() {
        fetch('http://127.0.0.1:8000/api/log')
            .then(res => res.json())
            .then(data => this.setState({logs: data.data}))
            .catch(console.log)
    }

    render() {
        const {logs} = this.state;
        return (
            <table className="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Created at</th>
                </tr>
                </thead>
                <tbody>
                {logs.map(log =>
                    <tr key={log.id}>
                        <td>{log.id}</td>
                        <td>{log.data}</td>
                        <td>{log.created_at}</td>
                    </tr>
                )}
                </tbody>
            </table>
        );
    }
}

export default List;

if (document.getElementById('list')) {
    ReactDOM.render(<List/>, document.getElementById('list'));
}
