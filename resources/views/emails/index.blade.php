<style>html,body { padding: 0; margin:0; }</style>
<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
		<tbody>
			<tr>
				<td align="center" valign="center" style="text-align:center; padding: 40px">
					<a href="https://keenthemes.com" rel="noopener" target="_blank">
						<img alt="Logo" src="{{asset('assets/media/logos/mail.svg')}}" />
					</a>
				</td>
			</tr>
			<tr>
				<td align="left" valign="center">
					<div style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
						<!--begin:Email content-->
						<div style="padding-bottom: 30px; font-size: 17px;">
							<strong>Welcome to Pazientio!</strong>
						</div>
						<div style="padding-bottom: 30px">You have been invited to join the Pazientio team from
						<a href="support@keenthemes.com" rel="noopener" target="_blank" style="text-decoration:none;color: #50CD89">support@Pazientio.com</a>. To get started, accept the invite below:</div>
						<div style="padding-bottom: 40px; text-align:center;">
							<a href="http://127.0.0.1:8000/verify_email/{{$body['email']}}" rel="noopener" style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#ffffff;background-color:#50CD89;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle" target="_blank">Verify Your Account</a>
						</div>
						<div style="padding-bottom: 30px">Joining the team will give you access to the team's dashboard, including information about our products.<br>
						<h4>Hello {{$body['name']}},You Join Pazientio as  [{{$body['role']}}] </h4>

<p>Here is your pazientio login Details</p>
<p><b>Role</b> : {{$body['role']}},</p>
<p><b>Username</b> : {{$body['email']}},</p>
<p><b>Password</b> : {{$body['password']}},</p>
					</div>
						
						<div style="padding-bottom: 30px">You can find answers to most questions and get in touch with us at
						<a href="#" rel="noopener" target="_blank" style="text-decoration:none;color: #50CD89">https://Pazientio.com/support</a>.</div>
						<!--end:Email content-->
						<div style="padding-bottom: 10px">Kind regards,
						<br>The Pazientio Team.
						<tr>
							<td align="center" valign="center" style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
								
								<p>Copyright &copy;
								<a href="#" rel="noopener" target="_blank">Pazientio</a>.</p>
							</td>
						</tr></br></div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>