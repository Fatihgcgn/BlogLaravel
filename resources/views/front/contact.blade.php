                @extends('front.layouts.master')
                @section('title', 'İletişim')
                @section('bg',
                    'https://www.etakisbahcesi.com/Upload/Dosyalar/resim-jpg/old-school-phone-shutterstock-747d30fe-0525-4536-8057-98fb6d3c4630.jpg?kirp=ok&quality=100')
                @section('content')

                    <div class="col-md-8">
                        <p>Bizimle iletişime geçmek ister misiniz?</p>

                        <form method="post" action="{{ route('contact.post') }}">
                            @csrf

                            <div class="control-group">
                                <label for="name">Ad Soyad</label>
                                <input class="form-control" name="name" type="text" placeholder="Enter your name..." />
                            </div>
                            <div class="control-group">
                                <label for="email">Email Adresi</label>
                                <input class="form-control" name="email" type="email"
                                    placeholder="Email adresiniz..." />
                            </div>
                            <div class="control-group">
                                <label for="topic">Konu</label>
                                <select class="form-control" name="topic">
                                    <option value="Bilgi">Bilgi</option>
                                    <option value="Destek">Destek</option>
                                    <option value="Genel">Genel</option>
                                </select>
                            </div>

                            <div class="control-group">
                                <label for="message">Mesajınız</label>
                                <textarea class="form-control" placeholder="Mesajınız" name="message" style="height: 12rem"></textarea>
                            </div>

                            <div class="control-group">
                            <button class="btn btn-primary" id="submitButton" type="submit">Gönder</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-default">
                            <div class="card-body">Panel Ekranı</div>
                            Adres : Sultangazi
                        </div>

                    @endsection
