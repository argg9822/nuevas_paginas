import logo from './logo.png';
import './styles/css-login.css';

function App() {
  let hora = new Date().toLocaleTimeString();
  let size_logo = 300;
  return (
    <div className="App">
      <header className="App-header">
        <img src={logo} alt="logo" width={size_logo}/>
        <h1>Nuevas páginas</h1>
        <input type = "text" placeholder = "Usuario" className='input-login'></input>
        <input type = "password" placeholder = "Contraseña" className='input-login'></input>
        <div>{hora}</div>
      </header>
    </div>
  );
}

export default App;