import logo from './logo.svg';
import './App.css';
import AddData from './AddData';
import GetData from './GetData';
import DeleteData from './DeleteData';
import UpdateData from './UpdateData';

function App() {
  return (
    <div className="App">
      <AddData></AddData>
      <GetData></GetData>
      <DeleteData></DeleteData>
      <UpdateData></UpdateData>
    </div>
  );
}

export default App;
