import { useState } from 'react';
import "./App.css";

function App() {

  const [count, setCount] = useState(0);
  const [name, setName] = useState('');
  const [isVisible, setIsVisible] = useState(true);
    
  return (
    <div className="App">
      <h1>ตัวอย่าง useState พื้นฐาน</h1>
      
     
      <div style={{ margin: '20px', padding: '20px', border: '1px solid #ccc' }}>
        <h2>1. Counter (ตัวนับ)</h2>
        <p>ค่า: {count}</p>
        <button onClick={() => setCount(count + 1)}>เพิ่ม</button>
        <button onClick={() => setCount(count - 1)}>ลด</button>
        <button onClick={() => setCount(0)}>รีเซ็ต</button>
      </div>

      
      <div style={{ margin: '20px', padding: '20px', border: '1px solid #ccc' }}>
        <h2>2. Input Field (ช่องกรอกข้อมูล)</h2>
        <input 
          type="text" 
          value={name} 
          onChange={(e) => setName(e.target.value)}
          placeholder="กรอกชื่อของคุณ"
        />
        <p>สวัสดี {name || 'ผู้เยี่ยมชม'}!</p>
      </div>

      
      <div style={{ margin: '20px', padding: '20px', border: '1px solid #ccc' }}>
        <h2>3. Toggle Visibility (แสดง/ซ่อน)</h2>
        <button onClick={() => setIsVisible(!isVisible)}>
          {isVisible ? 'ซ่อน' : 'แสดง'}
        </button>
        {isVisible && (
          <p style={{ color: 'green', fontWeight: 'bold' }}>
            ข้อความนี้จะแสดงหรือซ่อนได้!
          </p>
        )}
      </div>
    </div>
  );
}

export default App;
