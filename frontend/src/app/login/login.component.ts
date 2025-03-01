import { Component } from '@angular/core';
import { AuthService } from '../../service/auth.service'; // Certifique-se de importar o serviço correto

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {
  email: string = '';
  password: string = '';

  constructor(private authService: AuthService) {}

  login() {
    this.authService.login(this.email, this.password).subscribe(response => {
      localStorage.setItem('token', response.token);
      alert('Login bem-sucedido!');
    }, error => {
      alert('Credenciais inválidas!');
    });
  }
}
