# Change Logs

- [Thay đổi trong v0.6.0](#thay-đổi-trong-v060)
	- [Thay đổi trong v0.5.3](#thay-đổi-trong-v053)
	- [Thay đổi trong v0.5.2](#thay-đổi-trong-v052)
	- [Thay đổi trong v0.5.1](#thay-đổi-trong-v051)
	- [Thay đổi trong v0.5.0](#thay-đổi-trong-v050)
	- [Thay đổi trong v0.4.6](#thay-đổi-trong-v046)
	- [Thay đổi trong v0.4.5](#thay-đổi-trong-v045)
	- [Thay đổi trong v0.4.4](#thay-đổi-trong-v044)
	- [Thay đổi trong v0.4.3](#thay-đổi-trong-v043)
	- [Thay đổi trong v0.4.2](#thay-đổi-trong-v040)
	- [Thay đổi trong v0.4.1](#thay-đổi-trong-v040)
	- [Thay đổi trong v0.4.0](#thay-đổi-trong-v040)
	- [Thay đổi trong v0.4.0-prerelease](#thay-đổi-trong-v040-prerelease)
	- [Thay đổi trong v0.3.7](#thay-đổi-trong-v037)
	- [Thay đổi trong v0.3.6](#thay-đổi-trong-v036)
	- [Thay đổi trong v0.3.5](#thay-đổi-trong-v035)
	- [Thay đổi trong v0.3.4](#thay-đổi-trong-v034)
	- [Thay đổi trong v0.3.3](#thay-đổi-trong-v033)
	- [Thay đổi trong v0.3.2](#thay-đổi-trong-v032)
	- [Thay đổi trong v0.3.1](#thay-đổi-trong-v031)
	- [Thay đổi trong v0.3.0](#thay-đổi-trong-v030)
	- [Thay đổi trong v0.2.3](#thay-đổi-trong-v023)
	- [Thay đổi trong v0.2.2](#thay-đổi-trong-v022)
	- [Thay đổi trong v0.2.1](#thay-đổi-trong-v021)
	- [Thay đổi trong v0.2.0](#thay-đổi-trong-v020)

---

## Thay đổi trong v0.6.0

### rev3

* **Bug:** Sửa lỗi client spam request lấy danh sách đề bài khi tắt **Công khai đề bài** (ed1462987ca43a4dacdbd5fe48e739df754737d7)
* **Bug:** Sửa lỗi xung đột cache của `/api/rank` khi có đề bài bị tắt và tài khoản admin đang gửi request tới API này (8eb6a2e0a1649f45a3bbb95ac0819424a0ed6fd1)
* **Bug:** Sửa lỗi container của wrapper bị lệch khi hiển thị thời gian kì thi (#54)
* **Bug:** Sửa lỗi màu chữ của các input bị tối khi ở chế độ ban đêm (#53)
* **Bug:** Sửa lỗi chữ của panel bị trống hiển thị lệch về bên trái (#52)
* **Thay đổi:** Đổi font `Exo` thành `Nunito` (0c73b0239801080ade3ad876b766b64d205e0361)
* **Thay đổi:** Sắp xếp lại bố cục thư mục (bff1e668a7716cd70c0f2e03056a48ca22a67550 và 6537b2573bd98e97a04566456b1831fdd6f360da)
* **Thêm:** Cảnh báo người dùng khi thời gian so với máy chủ bị lệch (10c5a244138b5709559c006dfb7d75f10746510b)
* **Thêm:** Thêm tính năng bật/tắt công khai đề bài cho khách (aa14b655a47f95cdc468551eb975ab16438dab48)
* Sửa một số lỗi khác và thêm một số chức năng nhỏ

### rev2

* **Bug:** Sửa lỗi cửa sổ danh sách đề bài không hiển thị thanh trượt khi đề bài tràn ra ngoài cửa số (a3bd9e6e2358dc3850fc82abf4ecb0f122622397)
* **Bug:** Sửa lỗi `undefined index` ở một số API khi dùng **PHP/7.4** (22f60e20861b38e64e3a5e0a69144ebd35412775)
* **Bug:** Sửa lỗi không thể bật tắt cài đặt **Mở Đề Bài trong hộp thoại** (d961a4cb9b249a6579a48f297ff9a2560a6b0c94)
* **Thay đổi:** Thay đổi font của tiêu đề cửa sổ (0c73b0239801080ade3ad876b766b64d205e0361)

### rev1

* **Bug:** Sửa lỗi module `sounds` không tương thích với trình duyệt khác không chạy nhân `chromium` (1ca99107554bd5d59bf21eae07c179461a906f3f)
* **Bug:** Sửa lỗi request không được gửi lại sau khi hết `ratelimited` (f78e98f8f5ba43258544a423789fe4d771169c22)
* **Thêm:** Thêm tính năng đăng kí tài khoản! (a27eafd40de8fedbff0f9c1245c1e47bc7c2183f)
* **Thêm:** Thêm tính năng bật/tắt đề bài (ad05c23252fdb995f1555c2eec6c317b6554f528)
* **Thêm:** Thêm tính năng thu gọn cột trong bảng xếp hạng (b0fde080970e207becf3d372ff50351735095e6e)
* **Thêm:** Thêm tính năng xuất dữ liệu bảng xếp hạng thành tệp `csv` (7bca2aafeda20b516d7714e49e010875e0adb090)
* **Thêm:** Thêm cài đặt cho phép thay đổi icon và ảnh nền của kì thi (5cbfe4438fb6109b0dd017c4363c221b7112f3b6)
* **Thêm:** Tự động đóng bảng cài đặt khi nhấn chuột vào khu vực trống (e0a969dac5800c4372fc5f2c767a6766e887f0f7)
* **Thêm:** Cache API `/api/contest/rank` (dfd38718d1c9ac640a81ba327f3f17b594b5e280)
* **Thay đổi:** Thiết kế lại giao diện chính và đồng hồ của kì thi (9303a83e2de3b070f658e12f0472c0d475368a52)
* **Thay đổi:** Thiết kế lại giao diện đề bài (47d851e043910745025de4c2c1e5cfdb875fb2be)
* **Thay đổi:** Hiển thị nhiều dòng chi tiết của bài được chấm (033b9d52dcd939ad10f8d45a0516f7319e003742)
* **Thay đổi:** Hiển thị `username` trong bảng xếp hạng (c7adc2b720d0ae437354fede27c15696b55b3ba2)
* **Thay đổi:** Tách cài đặt **Cho phép thay đổi thông tin** thành **Cho phép thay đổi tên** , **Cho phép thay đổi mật khẩu** và **Cho phép thay đổi Avatar**  (7c46bec98a80731dceed406acde973c18b0cb8d7)
* **Thay đổi:** Ratelimit và cấm truy cập theo IP thay vì session (c2be547f1dc2825cc3bb961ff1b03ad67b35c9ab)
* **Loại bỏ:** Ngừng lấy địa chỉ WAN của máy chủ (df5324f69f6e3dba4c54fa483731f26059dc87f1)
* Sửa một số lỗi khác và thêm một số chức năng nhỏ

### Thay đổi trong v0.5.3

* **Bug:** Sửa lỗi font **Exo** không được tải (#31)
* **Thêm:** Thêm cài đặt: **Tự động cập nhật Xếp Hạng và Nhật Ký** (#32)
* **Thay đổi:** Hiển thị tên đề bài thay vì mã đề bài nếu có thể (2806eb0993d3a1c6c98db86da3af629607e3c430)
* **Thay đổi:** Lọc mã đề bài: Chỉ cho phép các kí tự (a-z A-Z) và số (0-9) (8e72ce23229d63696358ccc18b5e0a3e196a4cac)
* **Thay đổi:** Tăng giới hạn của cài đặt **Thời gian làm mới** (#32)
* **Thay đổi:** Cache các tài nguyên tĩnh (`sounds`, `fonts` và `img`) với thời hạn *1 tuần* (#32)
* **Thay đổi:** Loại bỏ *chuyển thành chữ thường* tại một số api (4458efc20fdbda895a3c70ec38631527c0437dd3, eb94135e3b452c23d6c30873f37dd6ea0636d23c, 1b80b01feb5eb050904d94888e828ce17238da1f)
* Sửa một số lỗi khác và thêm một số chức năng nhỏ

### Thay đổi trong v0.5.2

* **Chỉnh sửa:** Đính dòng đầu tiên của bảng xếp hạng ở phía trên để dễ dàng đọc hơn
* **Chỉnh sửa:** Thêm ratelimit cho trang `public`
* Sửa một số lỗi khác và thêm một số chức năng nhỏ

### Thay đổi trong v0.5.1

* **Bug:** Sửa icon hiển thị trong Avatar tại cài đặt người dùng hiển thị lệch (#26)
* **Bug:** Sửa không thể tiến hành nhập mật khẩu khi nhập sai tên người dùng (#27)
* **Bug:** Sửa lỗi phân tích tệp nhật ký (#28)
* **Bug:** Sửa lỗi hash của api `rank` và `logs` thay đổi liên tục do **Floating Number Precision** (part of 9133aafead1e1b3e16b18c788c1985c1897adea4)
* **Bug:** Loại bỏ chuyển tên người dùng thành chữ thường trong `logParser` (part of 9133aafead1e1b3e16b18c788c1985c1897adea4)
* **Bug:** Sửa lỗi Xếp Hạng và Nhật Ký dừng làm mới khi có lỗi hệ thống xảy ra (7ee6fc6169367d6700d72291fef1bb56e76b23b5)
* **Thêm:** Hiển thị xem trước cho tệp pdf trong `Cửa sổ xem đề bài` (7444b89178ca4ed2913e63aa8a5191867af99337)
* **Thay đổi:** Thay đổi `favicon.ico` (9158e031f89731373d2e489179b63c021dfef27c)

### Thay đổi trong v0.5.0

* **Bug:** Rò rỉ một số thông tin từ api "test/logs" khi tắt công bố kết quả (#19)
* **Bug:** Sửa lỗi hiển thị tại bảng nhật ký khi tắt Công bố kết quả (#20)
* **Bug:** Sửa lỗi hiển thị các test trong đề bài (#21)
* **Bug:** Sửa lỗi kéo thả tệp để nộp bài không hoạt động (#22)
* **Bug:** Lỗi chỉnh sửa ảnh đính kèm của đề bài (#23)
* **Bug:** Sửa lỗi khi đọc tệp nhật ký *Chưa được chấm*
* **Thêm:** Thêm bảng **Quản lý tài khoản**
* **Thêm:** Cài đặt người dùng: Tự động mở đề bài ở cửa sổ lớn
* **Thêm:** Xóa ảnh đính kèm và tệp đính kèm hiện tại của đề bài
* **Thêm:** Thêm một số cài đặt mới cho Admin
	* Bật bảng xếp hạng
	* Hiển thị điểm các bài làm trong bảng xếp hạng
* **Thay đổi:** Chỉnh sửa lại một số màu ở chế độ tối
* **Thay đổi:** Chỉnh sửa lại hiệu ứng ở bảng cài đặt
* **Thay đổi:** Thiết kế lại bố cục của bảng cài đặt
* **Thay đổi:** Hiển thị các nhật ký hệ thống dưới dạng trang
* **Thay đổi:** Đổi tên một số tên hàm và tên biến quan trọng
* **Thay đổi:** Đổi tên API
	* `test -> contest`
	* `avt -> avatar`
* **Thay đổi:** Loại bỏ Ratelimit ở API `avatar/get`
* **Thay đổi:** API `/contest/timer` tính toán chính xác đến hàng phần nghìn
* **Thay đổi:** Thiết kế lại trang `README`
* **Thay đổi:** Thay đổi cấu trúc hệ thống
	* Toàn bộ tệp public ở `data` được di chuyển sang `assets`
	* Toàn bộ tệp còn lại ở `data` đều bị cấm truy cập
	* Dữ liệu ảnh `avatar` được đưa đến thư mục `data`
* **Thay đổi:** Merge `ecatch` and `api_ecatch` into `belibrary`
* **Thay đổi:** Tách riêng module `sounds`
* **Thay đổi:** Thêm tài khoản admin vào trường hợp ngoại lệ của một số cài đặt
* Sửa một số lỗi khác và thêm một số chức năng nhỏ

### Thay đổi trong v0.4.6

* **Bug:** Tăng thêm điểm cho cùng một bài bằng cách nộp với nhiều kiểu tệp
* **Bug:** Lỗi `TypeError: Cannot read property 'contentWindow' of null` khi kì thi đang diễn ra
* **Bug:** Đọc nội dung tệp bị cấm bằng api `/avt/get` và `/avt/change` (RFI)
* **Bug:** Lỗi khi đọc tệp nhật ký với số điểm không có phần thập phân
* **Thêm:** Thêm meta tag vào trang web
* **Thêm:** Lazyload image
* **Thêm:** Giới hạn tên không được vượt quá 34 kí tự
* **Thêm:** Trang riêng cho phần `license`
* **Chỉnh sửa:** Hiển thị thông tin kì thi ở màn hình tải thay vì thông tin dự án
* **Chỉnh sửa:** Chỉnh sửa nút xem nhật ký tại bảng nhật ký
* **Chỉnh sửa:** Hiển thị đúng những dòng chữ bị tràn
* **Chỉnh sửa:** Tăng tốc độ kiểm tra thay đổi ở `rank` và `log`
* **Chỉnh sửa:** Thay đổi thiết kế bảng xếp hạng
* Sửa một số bug, lỗi hiển thị và thêm một số chức năng nhỏ khác~!

### Thay đổi trong v0.4.5

* **Bug:** Trang lỗi hiển thị ở api thay vì hiển thị đoạn json chứa thông tin lỗi
* **Bug:** Lỗi `Undefined Variable: lastmtime` tại `/api/contest/logs` khi tắt cài đặt `Cho phép xem nhật ký`
* **Chỉnh sửa:** Chỉnh sửa màu tại bảng rank cho các bài chính xác`
* **Chỉnh sửa:** Chỉnh sửa nút xem nhật ký tại bảng nhật ký`
* Sửa một số bug, lỗi hiển thị và thêm một số chức năng nhỏ

### Thay đổi trong v0.4.4

* **Bug:** Web dừng tải ở một số trình duyệt khác
* **Bug:** Avatar sẽ không bị kéo dãn khi sử dụng hình không phải hình vuông
* **Thêm:** Bật tắt hiển thị `mili giây` trong bảng thời gian
* **Thêm:** Thêm tên cho một số ngôn ngữ
* **Chỉnh sửa:** Thiết kế lại `hamburger icon`
* **Chỉnh sửa:** Thiết kế lại `syslogs viewer`
* **Chỉnh sửa:** Thời gian thay đổi theo thời gian hệ thống thay vì sử dụng `interval`
* **Chỉnh sửa:** `main-panel` giờ không còn thay đổi kích cỡ cùng với `btn-group`
* **Chỉnh sửa API:** API is now `Cross-Origin Resource Sharing`
* **Thêm:** Hiển thị tips và thông tin lỗi khi đang tải

### Thay đổi trong v0.4.3

* **Bug:** Một số lỗi hiển thị ở cửa sổ *xem nhật ký*
* **Bug:** Loại bỏ khoảng trống không mong muốn khi thay đổi kích thước của trình duyệt
* **Thêm:** Mở rộng ô xem đề bài thay vì chỉ mở rộng ảnh đính kèm
* **Thêm:** Cài đặt **Hiệu ứng**, dùng để bật/tắt hiệu ứng trong trang
* **Chỉnh sửa API:** Thay đổi một số biến của test/rank và test/viewlog
* **Chỉnh sửa:** Bảng tải lên sẽ hiển thị tiến trình tải lên của toàn bộ tệp thay vì hiển thị của từng tệp một
* **Chỉnh sửa:** Thay thế tiến trình theo % ở bảng thời gian thành `(thời gian bắt đầu) tới (thời gian kết thúc)`
* **Chỉnh sửa:** Thay đổi màu của một số phần tử
* **Chỉnh sửa:** Thay đổi hiệu ứng của bảng cài đặt
* **Chỉnh sửa:** Loại bỏ scrollBar trong bảng cài đặt
* **Chỉnh sửa:** Viết lại một số đoạn code cũ
* Sửa một số bug, lỗi hiển thị và thêm một số chức năng nhỏ

### Thay đổi trong v0.4.2

* **Bug:** Sửa các lỗi #6 #7 #8 
* **Bug:** Kiểm tra phiên bản mới lỗi khiến code dừng chạy
* **Thêm:** Thông tin địa chỉ máy chủ ở mục Admin
* **Chỉnh sửa:** Viết lại một số đoạn code cũ
* Sửa một số bug khác và thêm một số chức năng nhỏ

### Thay đổi trong v0.4.1

* **Thêm:** Add dark color scheme in login page
* **Thêm:** Now parse the log file to get data instead of showing the raw log file
* **Thêm:** Nhấn vào ảnh đính kèm trong đề bài để xem ảnh với kích cỡ to hơn
* **Thêm cài đặt:** Tiêu đề trang
* **Bug:** Danh sách file public của các đề không hiển thị khi giới hạn thời gian bị tắt
* **Chỉnh sửa:** Viết lại một số đoạn code cũ
* Sửa một số bug khác và thêm một số chức năng nhỏ

## Thay đổi trong v0.4.0 🎉🎉

* Fixed a bug where public file size does not show correctly
* Fixed a bug where `viewLogOther` setting does not updated correctly
* Redesigned error page
* *và các thay đổi ở phiên bản `v0.4.0-prerelease`...*

### Thay đổi trong v0.4.0-prerelease

* Added sounds
* Better disconnected/ratelimited handling (ajax request will wait until we out of ratelimit and then send it again)
* Separated `splash` into a submodule
* Improved version checking
* Improved disconnection handling
* Improved ratelimited handling
* Improved splashscreed
* Added Dark Mode
* Added 3 Settings:
	* Bài nộp lên phải có trong danh dách đề bài
	* Cho phép xem tệp nhật ký của người khác
	* Rate Limit
* Added Logging user event
* Public file browser/download
* Added file attachment in problem
* Fixed a `serious bug` where user can view problem directly

### Thay đổi trong v0.3.7

* Thiết kế lại userSettings
* Chuyển hai bảng cài đặt cho admin vào userSettings
* Sửa lỗi không xem được nhật kí khi chưa đăng nhập
* Xóa bỏ một số tệp không cần thiết
* Thêm kiểm tra phiên bản

### Thay đổi trong v0.3.6

* Thiết kế lại một số thành phần của trang web
* Sửa một số lỗi
* Cho phép xem tệp nhật kí của người khác

### Thay đổi trong v0.3.5

* Ẩn danh sách đề bài trước khi kì thi bắt đầu.
* Chuyển đổi toàn bộ ảnh về định dạng webp.

### Thay đổi trong v0.3.4

* Cho phép xem thời gian và xếp hạng mà không cần đăng nhập
* Tách riêng trang chủ và bảng điều khiển cho admin
* Sửa lỗi tài khoản khác mất điểm sau khi nộp bài
* Chỉnh sửa màu

### Thay đổi trong v0.3.3

* Sửa lỗi hiển thị thanh quá trình tải lên
* Thêm bảng đề bài
* Thêm problems API
* Sửa một số bug

### Thay đổi trong v0.3.2

* Một số chỉnh sửa cho API
* Thay đổi ảnh nền footer và errorpage
* Thêm apiexample
* Thên API Document trong Wiki

### Thay đổi trong v0.3.1

* Thiết kế lại user profile
* Sửa lỗi hiển thị sai thời gian khi số giây vượt quá 86400
* Sửa lại hiệu ứng trang đăng nhập
* Sửa lỗi hiển thị trang chính và trang đăng nhập trên điện thoại

### Thay đổi trong v0.3.0

* Chuyển định dạng tệp config thành json.
* Thêm bảng cài đặt dành cho admin.
* Sửa một số lỗi.

### Thay đổi trong v0.2.3

* Sửa một số lỗi.

### Thay đổi trong v0.2.2

* Sửa lỗi hiển thị tình trạng bài nộp không chính xác.

### Thay đổi trong v0.2.1

* API now require a token
* Vá các lỗ hổng bảo mật:
* CSRF

### Thay đổi trong v0.2.0

* Cho phép tải nhiều bài cùng lúc và hiện các bài đang trong hàng chờ
* Hiển thị tình trạng hiện tại của bài đã nộp
* Xem tệp nhật kí trực tiếp trên trang mà không cần tải về
* Vá các lỗ hổng bảo mật:
* XSS
* LFI/RFI
* Slowloris DoS
