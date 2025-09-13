<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
/**
* Показывает страницу с формой контактов.
*/
public function show()
{
return view('contact');
}

/**
* Обрабатывает отправку формы контактов.
*/
public function send(Request $request)
{
// Валидация данных формы
$validatedData = $request->validate([
'name' => 'required|string|max:255',
'email' => 'required|email|max:255',
'subject' => 'required|string|max:255',
'message' => 'required|string',
]);

// Здесь должна быть логика отправки email
// Например, используя встроенную в Laravel систему почты.
// Mail::to('admin@burger.com')->send(new ContactFormMail($validatedData));

// Для примера, мы просто вернем пользователя обратно с сообщением об успехе.
// Настройте отправку почты в .env файле для реальной работы.

// dd($validatedData); // Полезно для отладки: выведет данные и остановит выполнение

return back()->with('success', 'Ваше сообщение успешно отправлено!');
}
}