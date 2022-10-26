import React, { useState, useEffect, useRef } from 'react';
import { Link, useNavigate, useLocation } from 'react-router-dom';
import AuthenticationService from './AuthenticationService';

import './loginPage.css';

const usePrevLocation = (location) => {
	const prevLocRef = useRef(location)
	
	useEffect(()=>{
		prevLocRef.current = location
	},[location])
	
	if(prevLocRef.current.state !== null){
		return prevLocRef.current.state.preLocation.pathname
	} else {
		return ""
	}
}

const LoginPage = () => {
	let navigate = useNavigate();

	let location = useLocation();
	let prevLocation = usePrevLocation(location)

	function toHomePage() {
		navigate('/');
	}

	function toBack() {
		if(prevLocation === "/" || prevLocation === "/signup"){
			navigate("/main")
		} else {
			navigate(-1);
		}
	}

	const [userEmail, setUserEmail] = useState(localStorage.getItem('authenticatedUser') || '');
	const [userPassword, setUserPassword] = useState('');
	const [token, setToken] = useState(localStorage.getItem('token') || '');
	const [hasLoginFailed, setHasLoginFailed] = useState(false);
	const [showSuccessMessage, setShowSuccessMessage] = useState(false);

	const onChangeEmail = (e) => setUserEmail(e.target.value);
	const onChangePassword = (e) => setUserPassword(e.target.value);

	function loginClicked() {
		AuthenticationService.login(userEmail, userPassword)
			.then((response) => {
				setToken(response.data.data);

				AuthenticationService.registerSuccessfulLoginForJwt(userEmail, response.data.data);
				setShowSuccessMessage(true);
				setHasLoginFailed(false);

				toBack();
			})
			.catch(() => {
				setShowSuccessMessage(false);
				setHasLoginFailed(true);
				alert('Login Failed');
			});
	}

	function socialLoginGoogle() {
		AuthenticationService.loginSocialGoogle();
	}
	function socialLoginKakao() {
		AuthenticationService.loginSocialKakao();
	}

return (
    <div class="login-content">
<div className="login-content-header">
   <h1>
    <a href="#"><img src="./Friendary.png" alt="FrienDary" /></a>
   </h1>
</div>
<div className="login-content-body">
    <div className="login-content-body-main">
        <div class="login-content-body-main-title">
            <div class="login-content-body-main-title-logo">FrienDary</div>
        </div>
        <div class="login-content-body-main-title-text">프렌더리에 오신 것을 환영합니다.</div>
        <div class="login-content-body-main-info">
            <div class="login-content-body-main-info-id">
                <input id="userEmail" name="userEmail" placeholder="이메일" type="email" />
            </div>
            <div class="login-content-body-main-info-pw">
                <input id="userPw" name="userPw" placeholder="비밀번호" type="pw" />
            </div>
            <div class="login-content-body-main-btn-login">
                <button id="login" onClick={loginClicked}>
            로그인
            </button>
          </div>
          </div>
    <div class="divider">
        <div class="line"></div>
        <p>OR</p>
        <div class="line"></div>
     </div>

     <div class="login-content-body-main-social">
       <button type="submit" class="social-login-google"  onClick={socialLoginGoogle}>
            <img src="./google.png" alt="" class="google-img" /> 
            <span>Login in with Google</span>
        </button>
        <br></br>
        <button type="submit" class="social-login-kakao"  onClick={socialLoginKakao}>
            <img src="./kakao.png" alt="" class="kakao-img" />
            <span>Login in with Kakao</span>
        </button>
    </div>

    <div class="login-content-body-main-signup">
        <div class="login-content-body-main-signup-intro">아직 계정이 없으신가요?</div>
        <div class="login-content-body-main-signup-btn">
           회원가입
        </div>
    </div>
    </div>
    </div>
    </div>

            );
            };
export default loginPage;