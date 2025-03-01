import { Routes } from '@angular/router';

export const routes: Routes = [
  {path: '',pathMatch: 'full', redirectTo: 'user'},
  {path: 'user', loadChildren: () => import('./user/user.module').then(m => m.UserModule)}
];
