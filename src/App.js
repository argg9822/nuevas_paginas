import logo from './logo.png';
import './styles/css-login.css';

function App() {
  let size_logo = 200;
  return (
    <div className="App">
      <header className='App-header align-right'>
        <a href='https://gesiapp.com.co/'>Registrarse</a>
      </header>
      <section className="App-section">
        <div className='box-logo'>
          <img src={logo} alt="logo" width={size_logo}/>
        </div>
        <div className='flex-column flex-center w-100 box-login'>
          <h1>Nuevas páginas</h1>
          <input type = "text" placeholder = "Usuario" className='input-login'></input>
          <input type = "password" placeholder = "Contraseña" className='input-login'></input>
          <button type='submit' className='btn-login'>Ingresar</button>
        </div>
      </section>
    </div>
  );
}

export default App;