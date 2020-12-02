## 새로 배운 내용 
- Apache Tomcat
- JSP(Java Server Page)
  * HTML 내부에 java코드를 입력하여, 웹 서버에서 동적으로 웹 브라우저를 관리하는 언어
  * 구동원리 : jsp를 실행하면 jsp에서 생성된 서블릿이 실행됨
     1) 클라이언트가 jsp 실행을 요청하면, 서블릿 컨테이너는 jsp 파일에 대응하는 자바 서블릿을 찾아서 실행
     2) 대응하는 서블릿이 없거나, jsp 파일이 변경되었으면, jsp 엔진을 통해 서블릿 자바 소스 생성
     3) 자바  컴파일러가 서블릿 자바 소스를 클래스 파일로 컴파일
     4) jsp로 부터 생성된 서블릿은 서블릿 구동 방식에 의해 service() 메소드가 호출되고, 서블릿이 생성한 html 화면을  웹브라우저로 보냄
   * 구성요소 : 
     1) 템플릿 데이터 : 클라이언트로 출력되는 콘텐츠 (html, javascript, CSS, JSON, XML 등)
     2) JSP 전용 태그 : 서블릿 생성 시 특정 자바 코드로 바뀌는 태그
        - Directives(지시자) <%@ %>
            * 지시자 속성과 값에 따라 자바 코드 생성
            * page : jsp 페이지 속성 정의
            * taglib : 태그 라이브러리 선언
            * include
         - Scriptlet Elements(스크립트릿) <% 자바코드 %>
         - Declarations(선언문) <%! %>
            * 서블릿 클래스의 멤버(변수, 메소드)를 선언할 때 사용
            * 작성 위치는 상관 없음
         - Expressions(표현식) <%= %>
            * 문자열 출력
     3) JSP 내장 객체 : 별도의 선언 없이 사용 가능한 9개 객체
        - request, response, pageContext, session, application, config, out, page, exception

## 문제가 발생하거나 고민한 내용 + 해결과정
- 오라클 db를 연결할 때 test connection을 하면 오류가 남 -> port number를 1522로 바꾸고 host를 localhost로 바꿈.

## 참고할 만한 내용
- 과제 영상 : https://youtu.be/EpF5NiMkp9g

## 회고
- (+) : 새로운 것을 또 실습해볼 수 있어서 좋았다.
- (-) : 설치할 때 친구의 도움을 많이 받았던 것이 아쉽다.
- (!) : 과제를 좀 더 새로운 걸 추가를 많이 해보고 싶다.
