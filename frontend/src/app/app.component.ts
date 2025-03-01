import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { CommonModule } from '@angular/common';
import { AuthService } from '../service/auth.service';  // Certifique-se de importar o AuthService
import { LoginComponent } from './login/login.component'; // Importe o componente de login

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [HttpClientModule, CommonModule, LoginComponent], // Adicione LoginComponent aqui
  template: `
    <div *ngIf="!isAuthenticated">
      <app-login></app-login> <!-- Exibe o componente de login -->
    </div>
    <div *ngIf="isAuthenticated">
      <h1>{{ data?.message }}</h1>
      <ul>
        <li *ngFor="let item of data?.data">{{ item }}</li>
      </ul>
    </div>
  `,
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  data: any;
  isAuthenticated = false;

  constructor(private http: HttpClient, private authService: AuthService) {}

  ngOnInit() {
    // Verificar se o token está armazenado
    const token = localStorage.getItem('token');
    this.isAuthenticated = token ? true : false;

    if (this.isAuthenticated) {
      // Se o usuário estiver autenticado, busque os dados da API
      this.http.get('http://localhost:8000/users')
        .subscribe(response => {
          this.data = response;
          console.log(this.data);
        });
    }
  }
}
