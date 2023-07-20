import logo from './logo.png';
import './styles/css-login.css';

function App() {
  
  let size_logo = 250;
  return (
    <div className="App">
      <header className="App-header">
        <img src={logo} alt="logo" width={size_logo}/>
        <h1 className='color'>Nuevas páginas</h1>
        <input type = "text" placeholder = "Usuario" className='input-login'></input>
        <input type = "password" placeholder = "Contraseña" className='input-login'></input>
        <button type='submit' className='btn-login'>Ingresar</button>
      </header>
    </div>
  );
}

export default App;