<p><strong>Name:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Subject:</strong> {{ $data['subject'] }}</p>
<p><strong>Message:</strong></p>
<p>{{ nl2br(e($data['message'])) }}</p>